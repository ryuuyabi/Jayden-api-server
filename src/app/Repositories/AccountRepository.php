<?php

namespace App\Repositories;

use App\Concerns\Repository\RepositorySaveHandle;
use App\Concerns\Repository\RepositoryUpdateHandle;
use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

final class AccountRepository implements AccountRepositoryInterface
{
    use RepositorySaveHandle;
    use RepositoryUpdateHandle;

    /**
     * @var Account model
     */
    private Account $model;

    /**
     * instance
     */
    public function __construct()
    {
        $this->model = new Account();
    }

    /**
     * cognitoのusernameから詳細を取得します
     *
     * @param string $cognito_username
     * @return Model|null
     */
    public function getAccountFromUsername(string $cognito_username): Model|null
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

        return $this->model->where('cognito_username', $cognito_username)->where('cognito_sub', $cognito_sub)->first() ?? throw new ModelNotFoundException("アカウントが見つかりませんでした");
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
