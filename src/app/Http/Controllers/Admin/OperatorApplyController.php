<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Operator\Apply\OperatorApplyIndexAction;
use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class OperatorApplyController extends BaseController
{
    /**
     * 管理者申請一覧を取得します
     *
     * @param OperatorApplyIndexAction $action
     * @return JsonResponse
     */
    public function index(OperatorApplyIndexAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($action());
    }
}
