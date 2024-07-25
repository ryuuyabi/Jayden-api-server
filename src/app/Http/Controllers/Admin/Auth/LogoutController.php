<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Auth\Logout\LogoutStoreRequest;
use Illuminate\Support\Facades\Log;

final class LogoutController extends BaseController
{
    public function store(LogoutStoreRequest $request)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        Log::debug('ログアウトを行います');
    }
}
