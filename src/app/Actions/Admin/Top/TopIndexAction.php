<?php

namespace App\Actions\Admin\User;

use App\Repositories\NewsRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class TopIndexAction
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
     * TOP画面に表示するデータを取得する
     *
     * @return array
     */
    public function __invoke(): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return [
            'news_list' => $this->news_repository->getNewsListArrayForOperatorTop(5),
        ];
    }
}
