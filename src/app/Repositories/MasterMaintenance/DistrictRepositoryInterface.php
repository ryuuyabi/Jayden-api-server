<?php

namespace App\Repositories\MasterMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface DistrictRepositoryInterface
{
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;
    public function update(int $prefecture_id, array $update_data): Model;
    public function softDelete(int $prefecture_id): void;
    public function findOrFail(int $prefecture_id): Model;
    public function getDistrictsLengthAwarePaginatorSideOperator(): LengthAwarePaginator;
}
