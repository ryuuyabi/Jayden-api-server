<?php

namespace App\Http\Controllers;

use App\Enums\StatusCode;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Log;

final class ErrorResponseController extends BaseController
{
    public function notFound()
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return response()->json([
            'status' => StatusCode::NOT_FOUND,
        ]);
    }

    /**
     * 422エラー
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function unprocessableEntity(): \Illuminate\Http\JsonResponse
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return response()
            ->json([
                'code' => StatusCode::UNPROCESSABLE_ENTITY,
                'message' => 'miss validation',
            ]);
    }
}
