<?php

namespace App\Repositories;

use App\Models\NewsModel as News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface NewsRepositoryInterface
{
    /**
     * TOP画面用のお知らせ一覧を取得します
     *
     * @return Collection<int, array{id: int, name: string, body: string, icon_image_url: string|null}>
     */
    public function getNewsListForOperatorTop(): Collection;

    /**
     * お知らせ一覧をページネーションで取得します
     *
     * @param integer $page
     * @return LengthAwarePaginator<News>
     */
    public function getNewsListLengthAwarePaginatorSideOperator(int $page = 0): LengthAwarePaginator;

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
