<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface OperatorRepositoryInterface
{
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;
    public function softDelete(int $id): void;
    public function findOrFail(int $id): Model;
    public function findFromSub(string $sub): Model;
    public function canSub(string $sub): bool;
    public function getOperatorsLengthAwarePaginatorForOperatorSite(Request $request): LengthAwarePaginator;
}
