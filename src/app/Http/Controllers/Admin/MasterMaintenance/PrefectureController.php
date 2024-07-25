<?php

namespace App\Http\Controllers\Admin\MasterMaintenance;

use App\Actions\Admin\MasterMaintenance\Prefecture\PrefectureIndexAction;
use App\Actions\Admin\MasterMaintenance\Prefecture\PrefectureShowAction;
use App\Actions\Admin\MasterMaintenance\Prefecture\PrefectureUpdateAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\MasterMaintenance\Prefecture\PrefectureUpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class PrefectureController extends BaseController
{
    /**
     * マスタメンテナンス 県一覧を取得
     *
     * @param PrefectureIndexAction $action
     * @return JsonResponse
     */
    public function index(PrefectureIndexAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($action());
    }

    /**
     * マスタメンテナンス 県の詳細を取得
     *
     * @param integer $prefecture_id
     * @param PrefectureShowAction $action
     * @return JsonResponse
     */
    public function show(int $prefecture_id, PrefectureShowAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($action($prefecture_id));
    }

    /**
     * マスタメンテナンス 県の更新を行います
     *
     * @param integer $prefecture_id
     * @param PrefectureUpdateRequest $request
     * @param PrefectureUpdateAction $action
     * @return JsonResponse
     */
    public function update(int $prefecture_id, PrefectureUpdateRequest $request, PrefectureUpdateAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->flashMessage($action($prefecture_id, $request->validated()));
    }
}
