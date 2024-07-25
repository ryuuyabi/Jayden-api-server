<?php

namespace App\Actions\User\News;

use App\Repositories\NewsRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class NewsAllAction
{
    /**
     * @var NewsRepositoryInterface
     */
    private NewsRepositoryInterface $news_repository;

    public function __construct(NewsRepositoryInterface $news_repository)
    {
        $this->news_repository = $news_repository;
    }

    /**
     * お知らせ一覧を取得
     *
     * @return array
     */
    public function __invoke(): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->news_repository->getNewsListArrayForUserSide()->toArray();
    }
}
