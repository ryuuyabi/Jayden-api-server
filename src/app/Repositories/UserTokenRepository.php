<?php

namespace App\Repositories;

use App\Models\UserToken;
use Illuminate\Support\Facades\Log;

final class UserTokenRepository implements UserTokenRepositoryInterface
{
    private UserToken $model;

    public function __construct()
    {
        $this->model = new UserToken();
    }

    public function isTokenNotAvailable(int $user_id): bool
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $user_token = $this->model->where('user_id', $user_id)?->first() ?? false;
        if ($user_token === false) {
            return false;
        }
        if ($user_token->access_token_expires_at->lt(now())) {
            return false;
        }
        return true;
    }

    public function storeToken(bool $is_refresh_token = false): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $model = $this->model;
        $model->access_token_expires_at = $model->createAccessTokenExpiresAt();
        if ($is_refresh_token) {
            $model->refresh_token_expires_at = $model->createRefreshTokenExpiresAt();
        }
        $model->save();
    }
}
