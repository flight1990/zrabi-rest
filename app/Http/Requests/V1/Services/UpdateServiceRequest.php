<?php

namespace App\Http\Requests\V1\Services;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:190'],
            'content' => ['sometimes', 'string'],
            'price' => ['sometimes', 'numeric'],
            'category_id' => ['sometimes', 'exists:categories,id'],
            'user_id' => ['sometimes', 'exists:users,id'],
            'is_active' => ['sometimes', 'boolean'],
            'views' => ['sometimes', 'integer'],
            'tags' => ['sometimes', 'array'],
        ];
    }
}
