<?php

namespace App\Repositories;

use App\Concerns\Repository\RepositoryFindHandle;
use App\Concerns\Repository\RepositorySaveHandle;
use App\Enums\IsActive;
use App\Enums\IsNotion;
use App\Enums\User\UserStatus;
use App\Exceptions\NotFoundUserException;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

final class UserRepository implements UserRepositoryInterface
{
    use RepositorySaveHandle;
    use RepositoryFindHandle;

    /**
     * @var User model
     */
    private User $model;

    /**
     * instance
     */
    public function __construct()
    {
        $this->model = new User();
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
     * @param integer $page
     * @return LengthAwarePaginator<User>
     */
    public function getUsersLengthAwarePaginatorForOperatorSite(int $page): LengthAwarePaginator
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $query = $this->model->query();

        /** @var LengthAwarePaginator<User> */
        $query_paginate = $query->paginate(50, ['id', 'personal_name', 'email', 'status', 'is_notion', 'is_active'], 'page', $page + 1);

        $query_paginate->getCollection()->transform(function ($user) {
            $user->status = UserStatus::from($user->status)->description();
            $user->is_active = IsActive::from($user->is_active)->description();
            $user->is_notion = IsNotion::from($user->is_notion)->description();
            return $user;
        });
        return $query_paginate;
    }
}
