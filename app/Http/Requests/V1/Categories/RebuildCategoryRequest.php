<?php

namespace App\Http\Requests\V1\Categories;

use Illuminate\Foundation\Http\FormRequest;

class RebuildCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data' => ['required', 'array']
        ];
    }
}
