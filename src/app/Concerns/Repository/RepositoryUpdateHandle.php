<?php

namespace App\Concerns\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

trait RepositoryUpdateHandle
{
    /**
     * 更新
     *
     * @param array $update_data
     * @param integer $id
     * @return Model
     */
    public function update(array $update_data, int $id): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $model = $this->model->find($id);
        $model->fill($update_data)->save();
        return $model->refresh();
    }
}
