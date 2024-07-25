<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\News\NewsStoreAction;
use App\Actions\Admin\News\NewsTopAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\News\NewsStoreRequest;
use App\Models\NewsModel as News;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class NewsController extends BaseController
{
    /**
     * TOP画面に表示するお知らせを取得する
     *
     * @param NewsTopAction $action
     * @return JsonResponse
     */
    public function top(NewsTopAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($action());
    }

    /**
     * お知らせ一覧を取得します
     *
     * @param News $news
     * @return void
     */
    public function index(News $news)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($news->selectIndex()->paginate(20)->toArray());
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

    public function show(int $news_id, News $news)
    {
        return $this->ApiJsonFormat($news->find($news_id)->toArray());
    }
}
