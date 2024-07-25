<?php

namespace App\Http\Controllers\User\Auth;

use App\Actions\User\Auth\Authorization\AuthorizationAuthorizeAction;
use App\Actions\User\Auth\Authorization\AuthorizationCallbackAction;
use App\Actions\User\Auth\Authorization\AuthorizationRedirectAction;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class AuthorizationController extends BaseController
{
    /**
     * 認可エンドポイントに認可リクエストを行います
     *
     * @param AuthorizationRedirectAction $action
     * @return void
     */
    public function redirect(AuthorizationRedirectAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return redirect($action());
    }

    /**
     * 認可リクエストの検証を行います
     *
     * @param Request $request
     * @param AuthorizationAuthorizeAction $action
     * @return void
     */
    public function authorize(Request $request, AuthorizationAuthorizeAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return redirect($action($request->all()));
    }

    /**
     * 認証コードを返します
     *
     * @param AuthorizationCallbackAction $action
     * @return void
     */
    public function callback(AuthorizationCallbackAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
    }
}
