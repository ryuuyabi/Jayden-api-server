<?php

namespace App\Repositories;

interface UserTokenRepositoryInterface
{
    public function isTokenNotAvailable(int $user_id): bool;
    public function storeToken(bool $is_refresh_token): void;
}
