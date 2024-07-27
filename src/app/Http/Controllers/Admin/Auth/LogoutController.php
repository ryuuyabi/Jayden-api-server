<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Auth\Logout\LogoutStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class LogoutController extends BaseController
{
    public function store(): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        Log::debug('ログアウトを行います');

        return $this->flashMessage('ログアウトしました');
    }
}
