<?php

namespace App\Http\Requests\Admin\MasterMaintenance\District;

use App\Http\Requests\BaseFormRequest;

final class DistrictDestroyRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}