<?php

namespace App\Actions\Admin\Top;

use App\Concerns\ApiResponseFlashMessage;
use App\Repositories\NewsRepositoryInterface;
use App\Repositories\NotificationRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class TopIndexAction
{
    use ApiResponseFlashMessage;

    /**
     * @var NewsRepositoryInterface repository
     */
    private NewsRepositoryInterface $news_repository;

    /**
     * @var NotificationRepositoryInterface repository
     */
    private NotificationRepositoryInterface $notification_repository;

    /**
     * instance
     *
     * @param NewsRepositoryInterface $news_repository
     * @param NotificationRepositoryInterface $notification_repository
     */
    public function __construct(
        NewsRepositoryInterface $news_repository,
        NotificationRepositoryInterface $notification_repository
    ) {
        $this->news_repository = $news_repository;
        $this->notification_repository = $notification_repository;
    }

    /**
     * TOP画面に表示するデータを取得する
     *
     * @return array<string, mixed>
     */
    public function __invoke(): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return [
            'flash_message' => $this->getTopIndexMessage(),
            'news_list' => $this->news_repository->getNewsListForOperatorTop()->toArray(),
            'notifications' => $this->notification_repository->getNotificationsForOperatorTop()->toArray(),
        ];
    }
}
