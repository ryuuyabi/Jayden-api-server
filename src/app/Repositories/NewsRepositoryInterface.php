<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface NewsRepositoryInterface
{
    public function getNewsListArrayForUserSide(): LengthAwarePaginator;

    /**
     * TOP画面用のお知らせ一覧を取得します
     *
     * @return Model
     */
    public function getNewsListForOperatorTop(): Model;

    /**
     * お知らせ詳細を取得します
     *
     * @param integer $id
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail(int $id): Model;
}
