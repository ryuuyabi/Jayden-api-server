<?php

namespace App\Actions\Admin\User;

use App\Enums\User\UserRegistrationType;
use App\Repositories\AccountRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\Cognito;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

final class UserStoreAction
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
     * @var UserRepositoryInterface repository
     */
    private UserRepositoryInterface $user_repository;

    public function __construct(Cognito $cognito, AccountRepositoryInterface $account_repository, UserRepositoryInterface $user_repository)
    {
        $this->cognito = $cognito;
        $this->account_repository = $account_repository;
        $this->user_repository = $user_repository;
    }

    /**
     * ユーザの新規作成を行います
     *
     * @param array<string, mixed> $validate_data
     * @return void
     */
    public function __invoke(array $validate_data)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $email = $validate_data['email'];
        $user = match (UserRegistrationType::from($validate_data['user_registration_type'])) {
            UserRegistrationType::UNREGISTERED => $this->createUnregisteredUser($email),
            UserRegistrationType::REGISTRATION => $this->createRegistrationUser($email),
        };

        if ($this->account_repository->existsAccountFromEmail($email) === true) {
            $account = $this->account_repository->getAccountFromUsername($email);
            $this->account_repository->update(['user_id' => $user->id], $account->id);
            Log::debug("アカウント{$account->id}が見つかったのでユーザ{$user->id}の連携が完了しました");
        } else {
            Log::debug("メールアドレス:{$email}のアカウントは見つからなかったのでcognitoとアカウントの作成を行います");
            $cognito_sub = $this->createCognitoUser($email, $validate_data['password']);
            $account = $this->account_repository->save(['cognito_sub' => $cognito_sub, 'cognito_username' => $email]);
        }
    }

    /**
     * ステータスが登録のユーザを作成します
     *
     * @param string $email
     * @return Model
     */
    private function createRegistrationUser(string $email): Model
    {
        $user = $this->user_repository->save(['email' => $email, 'registration_type' => UserRegistrationType::REGISTRATION]);
        Log::info("登録ユーザ{$user->id}を作成しました");
        return $user;
    }

    /**
     * ステータスが未登録のユーザを作成します
     *
     * @param string $email
     * @return Model
     */
    private function createUnregisteredUser(string $email): Model
    {
        $user = $this->user_repository->save(['email' => $email, 'registration_type' => UserRegistrationType::UNREGISTERED]);
        Log::info("未登録ユーザ{$user->id}を作成しました");
        return $user;
    }

    /**
     * cognitoのユーザの作成を行います
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    private function createCognitoUser(string $email, string $password)
    {
        $cognito_response = $this->cognito->signUp($email, $password);
        Log::debug('cognito上のユーザ登録が完了しましたがステータスが未確認です');
        $this->cognito->confirmSignUp($email);
        Log::debug('cognito上のユーザ登録のステータスを確認済みに変更しました');
        return $cognito_response->toArray()['UserSub'];
    }
}
