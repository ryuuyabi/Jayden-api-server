<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RegistrationOperatorApplyRepositoryInterface
{
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;
}
