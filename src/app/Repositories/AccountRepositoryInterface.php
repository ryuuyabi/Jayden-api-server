<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface AccountRepositoryInterface
{
    /**
     * 新規登録を行います
     *
     * @param array<string, mixed> $store_data
     * @param boolean $is_fetch_result
     * @return Model|null
     */
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;

    /**
     * 更新を行います
     *
     * @param array<string, mixed> $update_data
     * @param integer $id
     * @return Model|null
     */
    public function update(array $update_data, int $id): Model|null;

    /**
     * cognitoユーザ名からアカウントを取得します
     *
     * @param string $cognito_username
     * @return Model|null
     */
    public function getAccountFromUsername(string $cognito_username): Model|null;

    /**
     * cognitoサブとcognitoユーザ名からアカウントを取得します
     *
     * @param string $cognito_sub
     * @param string $cognito_username
     * @return Model
     */
    public function getAccountFromSubAndUsername(string $cognito_sub, string $cognito_username): Model;

    /**
     * メールアドレスからアカウントを取得します
     *
     * @param string $email
     * @return boolean
     */
    public function existsAccountFromEmail(string $email): bool;

    /**
     * cognitoユーザ名のアカウントが存在するか取得
     *
     * @param string $cognito_username
     * @return boolean
     */
    public function isCognitoUsernameExists(string $cognito_username): bool;
}
