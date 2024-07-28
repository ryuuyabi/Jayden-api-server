<?php

namespace App\Http\Controllers;

use App\Enums\ApiDataType;
use App\Enums\StatusCode;
use Illuminate\Support\Facades\Log;

abstract class BaseController
{
    /**
     * クライアントに返すレスポンスの形式です
     *
     * @param array<mixed> $data
     * @param ApiDataType $data_type
     * @param StatusCode $status
     * @param string $message
     * @param string $redirect_path
     * @return \Illuminate\Http\JsonResponse
     */
    protected function ApiJsonFormat(
        array $data,
        object $data_type = ApiDataType::NORMAL,
        object $status = StatusCode::SUCCESS,
        string $message = 'success',
        string $redirect_path = '',
    ): \Illuminate\Http\JsonResponse {
        $api_data = response()
            ->json([
                'message' => $message,
                'status' => $status,
                'data_type' => $data_type,
                'data' => $data,
                'redirect_path' => $redirect_path,
            ]);
        Log::debug('response api data : ' . $api_data);
        return $api_data;
    }

    protected function flashMessage(string $message): \Illuminate\Http\JsonResponse
    {
        return $this->ApiJsonFormat(['flash_message' => $message]);
    }

    protected function flashMessageError(string $message = '通信エラーが起きました'): \Illuminate\Http\JsonResponse
    {
        return $this->ApiJsonFormat(['flash_message' => $message]);
    }
}
