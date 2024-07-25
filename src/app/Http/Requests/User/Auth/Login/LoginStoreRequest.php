<?php

namespace App\Http\Requests\User\Auth\Login;

use Illuminate\Foundation\Http\FormRequest;

final class LoginStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [],
            'password' => [],
        ];
    }
}
