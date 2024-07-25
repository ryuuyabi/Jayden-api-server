<?php

namespace App\Http\Requests\Admin\Auth\Token;

use App\Http\Requests\BaseFormRequest;

final class TokenCheckRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'access_token' => ['required', 'string']
        ];
    }
}
