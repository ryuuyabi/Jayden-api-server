<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface UnauthenticatedUserRepositoryInterface
{
    public function save(array $store_data): void;
    public function findOrFail(string $id): Model;
    public function destroy(string $id): void;
}
