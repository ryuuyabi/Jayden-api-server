<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Actions\Admin\Auth\Token\TokenCheckAction;
use App\Enums\ApiDataType;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Auth\Token\TokenCheckRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class TokenController extends BaseController
{
    public function check(TokenCheckRequest $request, TokenCheckAction $action): JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        Log::debug('アクセストークンの検証を行います');

        return $this->ApiJsonFormat($action($request->validated()), ApiDataType::NORMAL);
    }
}
