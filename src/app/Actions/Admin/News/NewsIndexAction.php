<?php

namespace App\Actions\Admin\News;

use App\Repositories\NewsRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class NewsIndexAction
{
    /**
     * @var NewsRepositoryInterface repository
     */
    private NewsRepositoryInterface $news_repository;

    /**
     * instance
     *
     * @param NewsRepositoryInterface $news_repository
     */
    public function __construct(NewsRepositoryInterface $news_repository)
    {
        $this->news_repository = $news_repository;
    }

    /**
     * お知らせ一覧を取得
     *
     * @param array<string, mixed> $request_data
     * @return array<string, mixed>
     */
    public function __invoke(array $request_data): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->news_repository->getNewsListLengthAwarePaginatorSideOperator($request_data['page'])->toArray();
    }
}
