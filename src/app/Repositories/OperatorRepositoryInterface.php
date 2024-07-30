<?php

namespace App\Repositories;

use App\Models\Operator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface OperatorRepositoryInterface
{
    /**
     * 登録を行います
     *
     * @param array<string, mixed> $store_data
     * @param boolean $is_fetch_result
     * @return Model|null
     */
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;

    /**
     * 管理者詳細を取得します
     *
     * @param integer $id
     * @return Model
     */
    public function findOrFail(int $id): Model;

    /**
     * subから管理者を取得します
     *
     * @param string $sub
     * @return Model|null
     */
    public function findFromSub(string $sub): Model|null;

    /**
     * 管理側に表示する管理者一覧を取得します
     *
     * @param Request $request
     * @return LengthAwarePaginator<Operator>
     */
    public function getOperatorsLengthAwarePaginatorForOperatorSite(Request $request): LengthAwarePaginator;
}
