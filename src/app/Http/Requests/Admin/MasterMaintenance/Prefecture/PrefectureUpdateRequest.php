<?php

namespace App\Http\Requests\Admin\MasterMaintenance\Prefecture;

use App\Enums\IsActive;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rules\Enum;

final class PrefectureUpdateRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:20'],
            'origin_name' => ['required', 'max:20'],
            'code' => ['required', 'max:3'],
            'is_active' => ['required', new Enum(IsActive::class)],
        ];
    }
}
