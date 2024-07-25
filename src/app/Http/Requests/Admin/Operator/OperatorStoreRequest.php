<?php

namespace App\Http\Requests\Admin\Operator;

use App\Enums\Operator\Role;
use App\Http\Requests\BaseFormRequest;
use App\Rules\CanMakeOperatorRole;
use Illuminate\Validation\Rules\Enum;

final class OperatorStoreRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nickname' => ['required', 'min:5', 'max:30'],
            'email' => ['required', 'email', 'unique:operators,email'],
            'password' => ['required', 'min:5', 'max:30'],
            'role' => ['required', new Enum(Role::class), new CanMakeOperatorRole()],
        ];
    }

    public function messages()
    {
        return [
            'personal_name.required' => '個人名を入力してください。',
            'nickname.required' => 'ニックネームを入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'password.required' => 'パスワードを入力してください。',
            'role.required' => '権限を入力してください。',
        ];
    }
}
