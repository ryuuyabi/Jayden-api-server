<?php

namespace App\Repositories;

interface CookingRepositoryInterface
{
    public function save(array $store_data): void;
}
