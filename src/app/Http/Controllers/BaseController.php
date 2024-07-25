<?php

namespace App\Http\Controllers;

use App\Enums\ApiDataType;
use App\Enums\StatusCode;
use Illuminate\Support\Facades\Log;

abstract class BaseController
{
    protected function ApiJsonFormat(
        array $data,
        object $data_type = ApiDataType::NORMAL,
        object $status = StatusCode::SUCCESS,
        string $message = 'success'
    ): \Illuminate\Http\JsonResponse {
        $api_data = response()
            ->json([
                'message' => $message,
                'status' => $status,
                'data_type' => $data_type,
                'data' => $data,
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
