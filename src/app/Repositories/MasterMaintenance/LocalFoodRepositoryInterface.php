<?php

namespace App\Repositories\MasterMaintenance;

use App\Models\LocalFood;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface LocalFoodRepositoryInterface
{
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;
    public function update(array $update_data, int $id): Model;
    public function findOrFail(int $id): Model;

    /**
     * 郷土料理一覧を取得します
     *
     * @return LengthAwarePaginator<LocalFood>
     */
    public function getLocalFoodsLengthAwarePaginatorSideOperator(): LengthAwarePaginator;
}
