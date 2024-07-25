<?php

namespace App\Http\Requests;

use App\Enums\ApiDataType;
use App\Enums\StatusCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Log;

abstract class BaseFormRequest extends FormRequest
{
    protected bool $validate_jwt = true;

    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator): void
    {
        Log::debug('バリデーションエラーが実行されました');
        $errors = $validator->errors()->toArray();
        $response['status'] = StatusCode::UNPROCESSABLE_ENTITY;
        $response['message'] = 'validation error';
        $response['data_type'] = ApiDataType::VALIDATE_ERROR;
        foreach ($errors as $key => $error_messages) {
            $response['data']['errors'][$key] = $error_messages[0];
        }
        $response_json = response()->json($response);
        Log::debug($response_json);
        throw new HttpResponseException($response_json);
    }
}
