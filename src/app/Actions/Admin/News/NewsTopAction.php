<?php

namespace App\Actions\Admin\News;

use App\Repositories\NewsRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class NewsTopAction
{
    /**
     * @var NewsRepositoryInterface repository
     */
    private readonly NewsRepositoryInterface $news_repository;

    public function __construct(NewsRepositoryInterface $news_repository)
    {
        $this->news_repository = $news_repository;
    }

    public function __invoke(): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->news_repository->getNewsListArray(3)->toArray();
    }
}
