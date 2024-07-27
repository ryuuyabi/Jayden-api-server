<?php

namespace App\Repositories;

use App\Exceptions\NotFoundUserException;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

final class UserRepository implements UserRepositoryInterface
{
    private User $model;

    public function __construct()
    {
        $this->model = new User();
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
     * 詳細を取得
     *
     * @param integer $id
     * @return Model
     */
    public function findOrFail(int $id): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->find($id) ?? throw new NotFoundUserException("ユーザ{$id}が見つかりませんでした");
    }

    /**
     * メールアドレスで詳細を取得
     *
     * @param string $email
     * @return Model
     */
    public function findOrFairFromEmail(string $email): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('email', $email)->first() ?? throw new NotFoundUserException("メールアドレス{$email}のユーザが見つかりませんでした");
    }

    /**
     * 管理側 ユーザ一覧をページネーションで取得
     *
     * @return LengthAwarePaginator
     */
    public function getUsersLengthAwarePaginatorForOperatorSite(): LengthAwarePaginator
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $users = $this->model->query()
            ->selectUserIndexForOperator()
            ->with('user_profile')
            ->paginate(20);
        return $users;
    }

    /**
     * ログイン可能ユーザを取得
     *
     * @param string $email
     * @param string $password
     * @return Model
     */
    public function getCanAuthUser(string $email, string $password): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $user = $this->model->where('email', $email)->first() ?? throw new NotFoundUserException("メールアドレス : {$email}のユーザが見つかりませんでした");
        if (Hash::check($password, $user->password)) {
            Log::debug('パスワード検証が成功しました');
        } else {
            throw new NotFoundUserException("パスワード : {$password}のユーザが見つかりませんでした");
        }
        return $user;
    }
}
