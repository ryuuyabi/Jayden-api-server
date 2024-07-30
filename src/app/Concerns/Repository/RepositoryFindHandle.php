<?php

namespace App\Concerns\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

trait RepositoryFindHandle
{
    /**
     * お知らせ詳細を取得します
     *
     * @param integer $id
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail(int $id): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->findOrFail($id);
    }
}
