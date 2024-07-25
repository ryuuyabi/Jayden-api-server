<?php

namespace App\Http\Requests\Admin\Auth\Login;

use App\Http\Requests\BaseFormRequest;

final class LoginStoreRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:accounts,cognito_username', 'exists:operators,email'],
            'password' => ['required', 'min:6', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\-+=^$*.\[\]{}()?\"!@#%&\/\\\\,><\':;|_~`\-+=])/']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'メールアドレスを入力してください',
            'email.exists' => 'メールアドレスが正しくありません',
            'email.email' => 'メールアドレスが正しくありません',
            'password.required' => 'パスワードを入力してください',
            'password.min' => '特殊記号,大文字,小文字を含む6文字以上を入力してください',
            'password.regex' => '特殊記号,大文字,小文字を含む6文字以上を入力してください',
        ];
    }
}
