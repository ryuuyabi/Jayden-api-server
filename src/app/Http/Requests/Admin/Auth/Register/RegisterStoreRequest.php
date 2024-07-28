<?php

namespace App\Http\Requests\Admin\Auth\Register;

use App\Enums\RegistrationOperatorApply\RegistrationOperatorApplyStatus;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

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
            'email' => [
                'required',
                'unique:users,email',
                Rule::unique('registration_operator_applies', 'email')->where(function ($query) {
                    $query->where('status', RegistrationOperatorApplyStatus::UNREGISTERED);
                })
            ]
        ];
    }

    /**
     * バリデーションメッセージ
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'メールアドレスは必須です',
            'email.unique' => 'メールアドレスは必須です',
            'email.exists' => 'メールアドレスは申請済み',
        ];
    }
}
