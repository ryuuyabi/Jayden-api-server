<?php

namespace App\Http\Controllers\User;

use App\Exceptions\NotFoundUserException;
use App\Http\Controllers\BaseController;
use App\Repositories\UserRepositoryInterface;
use App\Services\UserAuth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class AuthUserController extends BaseController
{
    /**
     * ログイン中ユーザ情報を取得
     *
     * @param UserAuth $user_auth
     * @param UserRepositoryInterface $user_repository
     * @return JsonResponse
     */
    public function __invoke(UserAuth $user_auth, UserRepositoryInterface $user_repository): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        try {
            $login_user = $user_repository->findOrFail($user_auth->getId());
            return $this->ApiJsonFormat(['login_user' => $login_user]);
        } catch (NotFoundUserException $e) {
            Log::error($e->getMessage());
            Log::debug('ユーザが未ログイン状態なので401エラーを起こします');
            abort(401);
        }
    }
}
