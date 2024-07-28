<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface AccountRepositoryInterface
{
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;
    public function update(array $update_data, int $account_id): Model;
    public function getAccountFromUsername(string $cognito_username): Model;
    public function getAccountFromSubAndUsername(string $cognito_sub, string $cognito_username): Model;
    public function existsAccountFromEmail(string $email): bool;
    public function isCognitoUsernameExists(string $cognito_username): bool;
}
