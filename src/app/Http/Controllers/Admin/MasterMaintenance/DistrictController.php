<?php

namespace App\Http\Controllers\Admin\MasterMaintenance;

use App\Actions\Admin\MasterMaintenance\District\DistrictDestroyAction;
use App\Actions\Admin\MasterMaintenance\District\DistrictIndexAction;
use App\Actions\Admin\MasterMaintenance\District\DistrictShowAction;
use App\Actions\Admin\MasterMaintenance\District\DistrictStoreAction;
use App\Actions\Admin\MasterMaintenance\District\DistrictUpdateAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\MasterMaintenance\District\DistrictDestroyRequest;
use App\Http\Requests\Admin\MasterMaintenance\District\DistrictStoreRequest;
use App\Http\Requests\Admin\MasterMaintenance\District\DistrictUpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class DistrictController extends BaseController
{
    /**
     * マスタメンテナンス 市区町村の一覧を取得
     *
     * @param DistrictIndexAction $action
     * @return JsonResponse
     */
    public function index(DistrictIndexAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat([$action()]);
    }

    /**
     * マスタメンテナンス 市区町村の新規登録を行います
     *
     * @param DistrictStoreRequest $request
     * @param DistrictStoreAction $action
     * @return JsonResponse
     */
    public function store(DistrictStoreRequest $request, DistrictStoreAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->flashMessage($action($request->validated()));
    }

    /**
     * マスタメンテナンス 市区町村の詳細を取得します
     *
     * @param integer $district_id
     * @param DistrictShowAction $action
     * @return JsonResponse
     */
    public function show(int $district_id, DistrictShowAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat(['district' => $action($district_id)]);
    }

    /**
     * マスタメンテナンス 市区町村の更新を行います
     *
     * @param integer $district_id
     * @param DistrictUpdateRequest $request
     * @param DistrictUpdateAction $action
     * @return JsonResponse
     */
    public function update(int $district_id, DistrictUpdateRequest $request, DistrictUpdateAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->flashMessage($action($district_id, $request->validated()));
    }

    /**
     * マスタメンテナンス 市区町村の論理削除を行います
     *
     * @param DistrictDestroyRequest $request
     * @param DistrictDestroyAction $action
     * @return JsonResponse
     */
    public function destroy(DistrictDestroyRequest $request, DistrictDestroyAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->flashMessage($action($request->validated()));
    }
}
