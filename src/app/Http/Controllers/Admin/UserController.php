<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\User\UserIndexAction;
use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class UserController extends BaseController
{
    /**
     * ユーザ一覧を取得します
     *
     * @param Request $request
     * @param UserIndexAction $action
     * @return JsonResponse
     */
    public function index(Request $request, UserIndexAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat($action($request->only('page')));
    }
}
