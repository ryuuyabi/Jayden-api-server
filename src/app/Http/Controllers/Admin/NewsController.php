<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\News\NewsIndexAction;
use App\Actions\Admin\News\NewsStoreAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\News\NewsStoreRequest;
use App\Models\NewsModel as News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class NewsController extends BaseController
{
    /**
     * お知らせ一覧を取得します
     *
     * @param Request $request
     * @param NewsIndexAction $action
     * @return JsonResponse
     */
    public function index(Request $request, NewsIndexAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($action($request->only(['page'])));
    }

    /**
     * お知らせの登録を行います
     *
     * @param NewsStoreRequest $request
     * @param NewsStoreAction $action
     * @return void
     */
    public function store(NewsStoreRequest $request, NewsStoreAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $action($request->validated());
    }

    /**
     * お知らせの詳細を取得します
     *
     * @param integer $news_id
     * @param News $news
     * @return JsonResponse
     */
    public function show(int $news_id, News $news): JsonResponse
    {
        return $this->ApiJsonFormat($news->find($news_id)->toArray());
    }
}
