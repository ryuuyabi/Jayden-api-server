<?php

namespace App\Http\Requests\User\Auth\Register;

use App\Http\Requests\BaseFormRequest;

final class RegisterStoreRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'unique:unauthenticated_users,email', 'unique:users,email'],
            'password'  => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'メールアドレスは必須です',
            'email.users' => '既にメールアドレスが登録されています',
            'password.required' => 'パスワードは必須です',
            'password.regex' => 'パスワードは小文字、大文字、数字、特殊文字それぞれ1文字以上入力してください'
        ];
    }
}
