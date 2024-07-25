<?php

namespace App\Http\Requests\Admin\MasterMaintenance\LocalFood;

use App\Enums\IsActive;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rules\Enum;

final class LocalFoodStoreRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100'],
            'prefecture_id' => ['required', 'exists:prefectures,id'],
            'is_active' => ['required', new Enum(IsActive::class)]
        ];
    }
}
