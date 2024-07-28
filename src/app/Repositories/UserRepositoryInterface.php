<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;
    public function findOrFail(int $id): Model;
    public function findOrFairFromEmail(string $email): Model;
    public function getUsersLengthAwarePaginatorForOperatorSite(): LengthAwarePaginator;
    public function getCanAuthUser(string $email, string $password): Model;
}
