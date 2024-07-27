<?php

namespace App\Concerns\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

trait RepositorySaveHandle
{
    /**
     * 新規登録
     *
     * @param array $store_data
     * @return Model
     */
    public function save(array $store_data, bool $is_fetch_result = false): Model|null
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $model = $this->model;
        $model->fill($store_data)->save();

        return $is_fetch_result ? $model->refresh() : null;
    }
}
