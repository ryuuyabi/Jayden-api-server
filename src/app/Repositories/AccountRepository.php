<?php

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

final class AccountRepository implements AccountRepositoryInterface
{
    private Account $model;

    public function __construct()
    {
        $this->model = new Account();
    }

    /**
     * 新規登録
     *
     * @param array $store_data
     * @return Model
     */
    public function save(array $store_data, bool $is_fetch_result = false): Model|null
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $model = $this->model;
        $model->fill($store_data)->save();
        return $model->refresh();
    }

    /**
     * 更新
     *
     * @param array $update_data
     * @param integer $account_id
     * @return Model
     */
    public function update(array $update_data, int $account_id): Model
    {
        $model = $this->model->find($account_id);
        $model->fill($update_data)->save();
        return $model->refresh();
    }

    /**
     * cognitoのusernameから詳細を取得します
     *
     * @param string $cognito_username
     * @return Model
     */
    public function getAccountFromUsername(string $cognito_username): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('cognito_username', $cognito_username)->first();
    }

    /**
     * cognitoのsubとusernameから詳細を取得します
     *
     * @param string $cognito_sub
     * @param string $cognito_username
     * @return Model
     */
    public function getAccountFromSubAndUsername(string $cognito_sub, string $cognito_username): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('cognito_username', $cognito_username)->where('cognito_sub', $cognito_sub)->first();
    }

    /**
     * メールアドレスからアカウントが存在するか判定します
     *
     * @param string $email ユニーク属性
     * @return boolean
     */
    public function existsAccountFromEmail(string $email): bool
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('email', $email)->exists();
    }

    /**
     * cognitoユーザネームが一致するアカウントが存在するか
     *
     * @param string $cognito_username
     * @return boolean
     */
    public function isCognitoUsernameExists(string $cognito_username): bool
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('cognito_username', $cognito_username)->exists();
    }
}
