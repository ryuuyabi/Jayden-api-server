<?php

namespace App\Actions\User\Auth\Login;

use App\Repositories\UserRepositoryInterface;
use App\Services\Cognito;
use App\Services\UserAuth;
use Illuminate\Support\Facades\Log;

final class LoginStoreAction
{
    /**
     * @var Cognito service
     */
    private Cognito $cognito;

    /**
     * @var UserAuth
     */
    private UserAuth $user_auth;

    /**
     * @var UserRepositoryInterface repository
     */
    private UserRepositoryInterface $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->cognito = new Cognito();
        $this->user_auth = new UserAuth();
        $this->user_repository = $user_repository;
    }

    /**
     * ログインを行います
     *
     * @param array $validate_data
     * @return void
     */
    public function __invoke(array $validate_data)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $user = $this->user_repository->getCanAuthUser($validate_data['email'], $validate_data['password']);
        $this->user_auth->loginUser($user->id);
    }
}
