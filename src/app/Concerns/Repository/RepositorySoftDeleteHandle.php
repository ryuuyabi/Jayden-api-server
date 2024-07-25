<?php

namespace App\Concerns\Repository;

use Illuminate\Support\Facades\Log;

trait RepositorySoftDeleteHandle
{
    /**
     * 論理削除
     *
     * @param integer $id
     * @return void
     */
    public function softDelete(int $id): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $model = $this->model->findOrFail($id);
        $model->deleted_at = now();
        $model->save();
    }
}
