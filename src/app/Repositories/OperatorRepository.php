<?php

namespace App\Repositories;

use App\Concerns\Repository\RepositoryFindHandle;
use App\Concerns\Repository\RepositorySaveHandle;
use App\Enums\IsActive;
use App\Enums\IsNotion;
use App\Enums\Operator\Role;
use App\Models\Operator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

final class OperatorRepository implements OperatorRepositoryInterface
{
    use RepositoryFindHandle;
    use RepositorySaveHandle;

    /**
     * @var Operator model
     */
    private Operator $model;

    /**
     * instance
     */
    public function __construct()
    {
        $this->model = new Operator();
    }

    /**
     * 管理者をsubから取得する
     *
     * @param string $sub
     * @return Model|null
     */
    public function findFromSub(string $sub): Model|null
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('sub', $sub)->first();
    }

    /**
     * 管理側に表示する管理者一覧を取得します
     *
     * @param integer $page
     * @return LengthAwarePaginator<Operator>
     */
    public function getOperatorsLengthAwarePaginatorForOperatorSite(int $page = 0): LengthAwarePaginator
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        /** @var LengthAwarePaginator<Operator> */
        $query_paginate = $this->model->query()->paginate(50, ['id', 'personal_name', 'email', 'role', 'is_notion', 'is_active'], 'page', $page + 1);

        $query_paginate->getCollection()->transform(function ($operator) {
            $operator->role = Role::from($operator->role)->description();
            $operator->is_active = IsActive::from($operator->is_active)->description();
            $operator->is_notion = IsNotion::from($operator->is_notion)->description();
            return $operator;
        });
        return $query_paginate;
    }
}
