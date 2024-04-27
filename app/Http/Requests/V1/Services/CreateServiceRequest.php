<?php

namespace App\Http\Requests\V1\Services;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:190'],
            'content' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'user_id' => ['required', 'exists:users,id'],
            'is_active' => ['sometimes', 'boolean'],
            'views' => ['sometimes', 'integer'],
            'tags' => ['sometimes', 'array'],
        ];
    }
}
