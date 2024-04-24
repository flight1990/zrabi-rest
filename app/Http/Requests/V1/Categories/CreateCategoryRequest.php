<?php

namespace App\Http\Requests\V1\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:190'],
            'parent_id' => ['sometimes', 'integer', 'exists:categories,id'],
        ];
    }
}
