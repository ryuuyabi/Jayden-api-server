<?php

namespace App\Http\Controllers\User;

use App\Actions\User\News\NewsAllAction;
use App\Actions\User\News\NewsIndexAction;
use App\Actions\User\News\NewsShowAction;
use App\Exceptions\NotFoundNewsException;
use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class NewsController extends BaseController
{
    /**
     * お知らせ５件を取得
     *
     * @param NewsIndexAction $action
     * @return JsonResponse
     */
    public function index(NewsIndexAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat(['news_list' => $action()]);
    }

    /**
     * お知らせ一覧を取得
     *
     * @param NewsAllAction $action
     * @return JsonResponse
     */
    public function all(NewsAllAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat(['news_list' => $action()]);
    }

    /**
     * お知らせ一覧を詳細を取得
     *
     * @param integer $news_id
     * @param NewsShowAction $action
     * @return JsonResponse
     */
    public function show(int $news_id, NewsShowAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        try {
            return $this->ApiJsonFormat(['news' => $action($news_id)]);
        } catch (NotFoundNewsException $e) {
            Log::error($e->getMessage());
            return $this->flashMessageError();
        }
    }
}
