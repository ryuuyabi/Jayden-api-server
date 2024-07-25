<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\User\TopIndexAction;
use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class TopController extends BaseController
{
    /**
     * 管理者TOP画面
     *
     * @param TopIndexAction $action
     * @return JsonResponse
     */
    public function index(TopIndexAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($action());
    }
}
