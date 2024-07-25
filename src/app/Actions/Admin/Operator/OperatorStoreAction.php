<?php

namespace App\Actions\Admin\Operator;

use App\Repositories\AccountRepositoryInterface;
use App\Repositories\OperatorRepositoryInterface;
use App\Services\Cognito;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

final class OperatorStoreAction
{
    /**
     * @var Cognito service
     */
    private Cognito $cognito;

    /**
     * @var AccountRepositoryInterface repository
     */
    private AccountRepositoryInterface $account_repository;

    /**
     * @var OperatorRepositoryInterface repository
     */
    private OperatorRepositoryInterface $operator_repository;

    /**
     * instance
     *
     * @param Cognito $cognito
     * @param AccountRepositoryInterface $account_repository
     * @param OperatorRepositoryInterface $operator_repository
     */
    public function __construct(Cognito $cognito, AccountRepositoryInterface $account_repository, OperatorRepositoryInterface $operator_repository)
    {
        $this->cognito = $cognito;
        $this->account_repository = $account_repository;
        $this->operator_repository = $operator_repository;
    }

    /**
     * 管理者の作成を行います
     *
     * @param array $validate_data
     * @return void
     */
    public function __invoke(array $validate_data): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $email = $validate_data['email'];
        $operator = $this->createOperator($email, $validate_data['nickname']);

        if ($this->account_repository->existsAccountFromEmail($email) === false) {
            Log::debug("{$email}のアカウントが存在しなかったのでcognitoとアカウントを作成します");
            $cognito_sub = $this->createCognitoUser($email, $validate_data['password']);
            $this->createAccount($cognito_sub, $email, $operator->id);
        }
    }

    /**
     * アカウントの作成を行います
     *
     * @param string $cognito_sub
     * @param string $email
     * @param integer $operator_id
     * @return void
     */
    private function createAccount(string $cognito_sub, string $email, int $operator_id): void
    {
        Log::debug("管理者{$operator_id}と連携するアカウントの作成を行います");
        $this->account_repository->save(['cognito_username' => $email, 'cognito_sub' => $cognito_sub, 'operator_id' => $operator_id]);
    }

    /**
     * 管理者の作成を行います
     *
     * @param string $email
     * @param string $nickname
     * @return Model
     */
    private function createOperator(string $email, string $nickname): Model
    {
        Log::debug("管理者の作成を行います");
        $operator = $this->operator_repository->save(['email' => $email, 'nickname' => $nickname]);
        Log::debug("管理者{$operator->id}が作成されました");
        return $operator;
    }

    /**
     * cognitoにユーザを作成します
     *
     * @param string $email
     * @param string $password
     * @return string
     */
    private function createCognitoUser(string $email, string $password): string
    {
        $cognito_response = $this->cognito->signUp($email, $password);
        Log::debug('cognito上のユーザ登録が完了しましたがステータスが未確認です');
        $this->cognito->confirmSignUp($email);
        Log::debug('cognito上のユーザ登録のステータスを確認済みに変更しました');
        return $cognito_response->toArray()['UserSub'];
    }
}
