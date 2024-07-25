<?php

namespace App\Http\Controllers\Admin\MasterMaintenance;

use App\Actions\Admin\MasterMaintenance\LocalFood\LocalFoodDestroyAction;
use App\Actions\Admin\MasterMaintenance\LocalFood\LocalFoodIndexAction;
use App\Actions\Admin\MasterMaintenance\LocalFood\LocalFoodShowAction;
use App\Actions\Admin\MasterMaintenance\LocalFood\LocalFoodStoreAction;
use App\Actions\Admin\MasterMaintenance\LocalFood\LocalFoodUpdateAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\MasterMaintenance\LocalFood\LocalFoodDestroyRequest;
use App\Http\Requests\Admin\MasterMaintenance\LocalFood\LocalFoodStoreRequest;
use App\Http\Requests\Admin\MasterMaintenance\LocalFood\LocalFoodUpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class LocalFoodController extends BaseController
{
    /**
     * マスタメンテナンス 郷土料理一覧を取得
     *
     * @param LocalFoodIndexAction $action
     * @return JsonResponse
     */
    public function index(LocalFoodIndexAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat([$action()]);
    }

    /**
     * マスタメンテナンス 郷土料理を登録します
     *
     * @param LocalFoodStoreRequest $request
     * @param LocalFoodStoreAction $action
     * @return JsonResponse
     */
    public function store(LocalFoodStoreRequest $request, LocalFoodStoreAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->flashMessage($action($request->validated()));
    }

    /**
     * マスタメンテナンス 郷土料理の詳細を取得するため
     *
     * @param integer $local_food_id
     * @param LocalFoodShowAction $action
     * @return JsonResponse
     */
    public function show(int $local_food_id, LocalFoodShowAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($action($local_food_id));
    }

    /**
     * マスタメンテナンス 郷土料理の更新を行うため
     *
     * @param integer $local_food_id
     * @param LocalFoodUpdateRequest $request
     * @param LocalFoodUpdateAction $action
     * @return JsonResponse
     */
    public function update(int $local_food_id, LocalFoodUpdateRequest $request, LocalFoodUpdateAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->flashMessage($action($request->validated(), $local_food_id));
    }

    /**
     * マスタメンテナンス 郷土料理の削除を行うため
     *
     * @param LocalFoodDestroyRequest $request
     * @param LocalFoodDestroyAction $action
     * @return JsonResponse
     */
    public function destroy(LocalFoodDestroyRequest $request, LocalFoodDestroyAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->flashMessage($action($request->validated()));
    }
}
