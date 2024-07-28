<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Operator\RegistrationOperatorApplyIndexAction;
use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class RegistrationOperatorApplyController extends BaseController
{
    /**
     * 管理者作成申請の一覧を表示します
     *
     * @param RegistrationOperatorApplyIndexAction $action
     * @return JsonResponse
     */
    public function index(RegistrationOperatorApplyIndexAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($action());
    }
}
