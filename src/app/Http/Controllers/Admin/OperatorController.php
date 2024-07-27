<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Operator\OperatorDestroyAction;
use App\Actions\Admin\Operator\OperatorIndexAction;
use App\Actions\Admin\Operator\OperatorShowAction;
use App\Actions\Admin\Operator\OperatorStoreAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Operator\OperatorDestroyRequest;
use App\Http\Requests\Admin\Operator\OperatorStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\JsonResponse;

final class OperatorController extends BaseController
{
    /**
     * 管理者一覧を取得します
     *
     * @param Request $request
     * @param OperatorIndexAction $action
     * @return JsonResponse
     */
    public function index(Request $request, OperatorIndexAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($action($request));
    }

    /**
     * 管理者の登録を行います
     *
     * @param OperatorStoreRequest $request
     * @param OperatorStoreAction $action
     * @return JsonResponse
     */
    public function store(OperatorStoreRequest $request, OperatorStoreAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        try {
            $action($request->validated());
            return $this->flashMessage('管理者の作成に成功しました');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->flashMessageError();
        }
    }

    /**
     * 管理者の詳細を取得します
     *
     * @param integer $operator_id
     * @param OperatorShowAction $action
     * @return JsonResponse
     */
    public function show(int $operator_id, OperatorShowAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat(['operator' => $action($operator_id)]);
    }

    /**
     * 管理者の削除を行います
     *
     * @param OperatorDestroyRequest $request
     * @param OperatorDestroyAction $action
     * @return JsonResponse
     */
    public function destroy(OperatorDestroyRequest $request, OperatorDestroyAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $action($request->validated());
        return $this->flashMessage('管理者の削除に成功しました');
    }
}
