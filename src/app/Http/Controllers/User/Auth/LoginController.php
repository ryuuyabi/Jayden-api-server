<?php

namespace App\Http\Controllers\User\Auth;

use App\Actions\User\Auth\Login\LoginStoreAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\User\Auth\Login\LoginStoreRequest;
use Illuminate\Support\Facades\Log;

final class LoginController extends BaseController
{
    /**
     * ログイン認証
     *
     * @param LoginStoreRequest $request
     * @param LoginStoreAction $action
     * @return void
     */
    public function store(LoginStoreRequest $request, LoginStoreAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $action($request->validated());
    }
}
