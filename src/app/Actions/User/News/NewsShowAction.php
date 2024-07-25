<?php

namespace App\Actions\User\News;

use App\Repositories\NewsReadRepositoryInterface;
use App\Repositories\NewsRepositoryInterface;
use App\Services\UserAuth;
use Illuminate\Support\Facades\Log;

final class NewsShowAction
{
    /**
     * @var UserAuth service
     */
    private UserAuth $user_auth;

    /**
     * @var NewsRepositoryInterface repository
     */
    private NewsRepositoryInterface $news_repository;

    /**
     * @var NewsReadRepositoryInterface repository
     */
    private NewsReadRepositoryInterface $news_read_repository;

    public function __construct(
        NewsRepositoryInterface $news_repository,
        NewsReadRepositoryInterface $news_read_repository
    ) {
        $this->user_auth = new UserAuth();
        $this->news_repository = $news_repository;
        $this->news_read_repository = $news_read_repository;
    }

    /**
     * お知らせ詳細を取得
     *
     * @param integer $id
     * @return array
     */
    public function __invoke(int $id): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        if ($this->news_read_repository->isReadNews($id, $this->user_auth->getId()) === false) {
            $this->readNews($id);
        }
        return $this->news_repository->findOrFail($id)->toArray();
    }

    /**
     * お知らせを既読
     *
     * @param integer $id
     * @return void
     */
    private function readNews(int $id): void
    {
        Log::debug("お知らせ{$id}をユーザ{$this->user_auth->getId()}が既読しました");
        $this->news_read_repository->save(['news_id' => $id, 'user_id' => $this->user_auth->getId()]);
    }
}
