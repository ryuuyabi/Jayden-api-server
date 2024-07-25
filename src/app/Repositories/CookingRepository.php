<?php

namespace App\Repositories;

use App\Models\Cooking;
use Illuminate\Support\Facades\Log;

final class CookingRepository implements CookingRepositoryInterface
{
    private Cooking $model;

    public function __construct()
    {
        $this->model = new Cooking();
    }

    public function save(array $store_data): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->model->fill($store_data)->save();
    }
}
