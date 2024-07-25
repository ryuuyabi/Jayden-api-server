<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Actions\Admin\Auth\Login\LoginStoreAction;
use App\Exceptions\MismatchOperatorPassword;
use App\Exceptions\NotFoundOperatorException;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Auth\Login\LoginStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class LoginController extends BaseController
{
    /**
     * 管理者のログインを行います
     *
     * @param LoginStoreRequest $request
     * @param LoginStoreAction $action
     * @return JsonResponse
     */
    public function store(LoginStoreRequest $request, LoginStoreAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        Log::debug("ログイン認証を行います");

        try {
            $response_data = $action($request->all());
            Log::debug("ログイン認証が成功しました");
            return $this->ApiJsonFormat($response_data);
        } catch (NotFoundOperatorException $e) {
            Log::error($e->getMessage());
            Log::debug("ログイン認証が失敗しました");
            return $this->flashMessageError();
        } catch (MismatchOperatorPassword $e) {
            Log::error($e->getMessage());
            Log::debug("ログイン認証が失敗しました");
            return $this->flashMessageError();
        }
    }
}
