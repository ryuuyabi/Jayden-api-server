<?php

namespace App\Repositories;

use App\Concerns\Repository\RepositoryFindHandle;
use App\Concerns\Repository\RepositorySaveHandle;
use App\Models\NewsModel as News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsRepository implements NewsRepositoryInterface
{
    use RepositoryFindHandle;

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
     * お知らせ一覧を取得
     *
     * @return Collection
     */
    public function getNewsListForOperatorTop(): Collection
    {
        return $this->model->selectTop()->targetOperator()->active()->notDeleted()->limit(5)->orderByDesc('id')->get();
    }
}
