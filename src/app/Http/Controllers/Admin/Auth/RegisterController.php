<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Actions\Admin\Auth\Register\RegisterStoreAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Auth\Register\RegisterStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class RegisterController extends BaseController
{
    /**
     * 管理者作成の申請を行います
     *
     * @param RegisterStoreRequest $request
     * @param RegisterStoreAction $action
     * @return JsonResponse
     */
    public function store(RegisterStoreRequest $request, RegisterStoreAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $action($request->validated());
        return $this->flashMessage('管理者作成の申請に成功しました');
    }
}
