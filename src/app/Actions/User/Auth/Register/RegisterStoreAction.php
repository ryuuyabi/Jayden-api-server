<?php

namespace App\Actions\User\Auth\Register;

use App\Mail\User\UserRegistrationNotification;
use App\Repositories\AccountRepositoryInterface;
use App\Repositories\UnauthenticatedUserRepositoryInterface;
use App\Services\Cognito;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

final class RegisterStoreAction
{
    /**
     * @var Cognito
     */
    private Cognito $cognito;

    /**
     * @var AccountRepositoryInterface
     */
    private AccountRepositoryInterface $account_repository;

    /**
     * @var UnauthenticatedUserRepositoryInterface
     */
    private UnauthenticatedUserRepositoryInterface $unauthenticated_user_repository;

    /**
     * 初期化処理
     */
    public function __construct(
        AccountRepositoryInterface $account_repository,
        UnauthenticatedUserRepositoryInterface $unauthenticated_user_repository
    ) {
        $this->cognito = new Cognito();
        $this->account_repository = $account_repository;
        $this->account_repository = $account_repository;
        $this->unauthenticated_user_repository = $unauthenticated_user_repository;
    }

    /**
     * 未認証ユーザを作成する
     *
     * @param array $validate_data
     * @return void
     */
    public function __invoke(array $validate_data)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        DB::transaction(function () use ($validate_data) {
            $email = $validate_data['email'];
            $id = uuid_create();
            if ($this->checkAccountExists($email)) {
                Log::debug("{$email}のアカウントが存在しましたのでcognitoの作成は行いません");
                Log::debug("{$email}の未認証ユーザを登録します");
                $this->createUnauthenticatedUser($email, $id);
            } else {
                Log::debug("{$email}のアカウントが存在しなかったのでcognitoの作成を行います");
                $this->createCognitoUser($validate_data);
                Log::debug("{$email}の未認証ユーザを登録します");
                $this->createUnauthenticatedUser($email, $id);
            }
            Mail::to($email)->send(new UserRegistrationNotification($id, Hash::make($email)));
        });
    }

    /**
     * cognitoを登録します
     * cognito情報を持つアカウントを作成します
     *
     * @param array $validate_data
     * @return void
     */
    private function createCognitoUser(array $validate_data)
    {
        $response = $this->cognito->signUp($validate_data['email'], $validate_data['password']);
        $this->createAccount($validate_data['email'], $response->toArray()['UserSub']);
    }

    /**
     * 未認証ユーザを作成します
     *
     * @param string $email
     * @param string $id
     * @return void
     */
    private function createUnauthenticatedUser(string $email, string $id): void
    {
        $this->unauthenticated_user_repository->save(['id' => $id, 'email' => $email]);
    }

    /**
     * アカウントを作成します
     *
     * @param string $email
     * @param string $user_sub
     * @return void
     */
    private function createAccount(string $email, string $user_sub): void
    {
        $this->account_repository->save(['cognito_username' => $email, 'cognito_sub' => $user_sub]);
    }

    /**
     * メールアドレスのアカウントが存在するか取得します
     *
     * @param string $cognito_username
     * @return boolean
     */
    private function checkAccountExists(string $email): bool
    {
        return $this->account_repository->isCognitoUsernameExists($email);
    }
}
