<?php

namespace App\Concerns\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

trait RepositoryUpdateHandle
{
    /**
     * 更新
     *
     * @param array<string, mixed> $update_data
     * @param integer $id
     * @param boolean $is_fetch_result
     * @return Model|null
     */
    public function update(array $update_data, int $id, bool $is_fetch_result = false): Model|null
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $model = $this->model;
        $find_model = $model->find($id);
        if ($find_model === null) {
            throw new ModelNotFoundException("{$model->getTable()}のidが{$id}のレコードが見つかりませんでした");
        }
        $find_model->fill($update_data)->save();
        return $is_fetch_result ? $find_model->refresh() : null;
    }
}
