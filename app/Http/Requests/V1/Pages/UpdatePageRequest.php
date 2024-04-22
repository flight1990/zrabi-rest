<?php

namespace App\Http\Requests\V1\Pages;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
            'is_active' => ['sometimes', 'boolean']
        ];
    }
}
