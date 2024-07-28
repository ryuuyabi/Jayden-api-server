<?php

namespace App\Repositories;

use App\Exceptions\NotFoundNewsException;
use App\Models\NewsModel as News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsRepository implements NewsRepositoryInterface
{
    private News $model;

    public function __construct()
    {
        $this->model = new News();
    }

    /**
     * 一覧を取得します
     *
     * @return LengthAwarePaginator
     */
    public function getNewsListArrayForUserSide(): LengthAwarePaginator
    {
        $news = $this->model->active()->orderByDesc('id')->id;
        return $news->paginate(15);
    }

    /**
     * 5件取得
     *
     * @return Collection
     */
    public function getNewsListLimitFiveArray(): Collection
    {
        return $this->model->active()->limit(5)->orderByDesc('id')->get();
    }

    /**
     * お知らせ一覧を取得
     *
     * @return Collection
     */
    public function getNewsListArrayForOperatorTop(): Collection
    {
        return $this->model->selectTop()->targetOperator()->active()->notDeleted()->limit(5)->orderByDesc('id')->get();
    }

    /**
     * 詳細
     *
     * @param integer $id
     * @return Model
     */
    public function findOrFail(int $id): Model
    {
        return $this->model->find($id) ?? throw new NotFoundNewsException("お知らせ{$id}は見つかりませんでした");
    }
}
