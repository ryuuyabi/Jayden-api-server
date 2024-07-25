<?php

namespace App\Repositories\MasterMaintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface LocalFoodRepositoryInterface
{
    public function save(array $store_data): Model;
    public function update(array $update_data, int $id): Model;
    public function softDelete(int $id): void;
    public function findOrFail(int $id): Model;
    public function getLocalFoodsLengthAwarePaginatorSideOperator(): LengthAwarePaginator;
}
