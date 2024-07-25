<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface UserProfileRepositoryInterface
{
    public function save(array $store_data): void;
    public function findOrFail(int $id): Model;
}
