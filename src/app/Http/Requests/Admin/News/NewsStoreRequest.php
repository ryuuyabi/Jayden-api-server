<?php

namespace App\Http\Requests\Admin\News;

use App\Enums\News\NewsType;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rules\Enum;

final class NewsStoreRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:30'],
            'body' => ['required', 'min:5', 'max:500'],
            'release_date' => ['required'],
            'news_type' => ['required', new Enum(NewsType::class)],
        ];
    }
}
