<?php

namespace App\Repositories;

use App\Concerns\Repository\RepositoryFindHandle;
use App\Enums\IsActive;
use App\Enums\News\NewsType;
use App\Models\NewsModel as News;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

final class NewsRepository implements NewsRepositoryInterface
{
    use RepositoryFindHandle;

    /**
     * @var News model
     */
    private News $model;

    /**
     * instance
     */
    public function __construct()
    {
        $this->model = new News();
    }

    /**
     * お知らせ一覧を取得
     *
     * @return Collection<int, array{id: int, name: string, body: string, icon_image_url: string|null}>
     */
    public function getNewsListForOperatorTop(): Collection
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $quey_result = $this->model->query()
            ->select(['id', 'name', 'body', 'operator_id'])
            ->with(['operator' => function ($query) {
                $query->select(['id', 'icon_image_url']);
            }])
            ->whereIn('news_type', [NewsType::ADMIN, NewsType::EVERYONE])
            ->limit(5)
            ->get();

        return $quey_result->map(function ($query) {
            return [
                'id' => $query->id,
                'name' => $query->name,
                'body' => $query->body,
                'icon_image_url' => $query->operator?->icon_image_url,
            ];
        });
    }

    /**
     * お知らせ一覧をページネーションで取得します
     *
     * @param integer $page
     * @return LengthAwarePaginator<News>
     */
    public function getNewsListLengthAwarePaginatorSideOperator(int $page = 0): LengthAwarePaginator
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        /** @var LengthAwarePaginator<News> */
        $query_result = $this->model
            ->query()
            ->select(['id', 'name', 'body', 'is_active', 'operator_id', 'release_date'])
            ->paginate(perPage: 20, page: $page + 1);

        $query_result->getCollection()->transform(function ($news) {
            $news->release_date = (new Carbon($news->release_date))->format('Y/m/d');
            $news->is_active = IsActive::from($news->is_active)->description();
            return $news;
        });
        return $query_result;
    }
}
