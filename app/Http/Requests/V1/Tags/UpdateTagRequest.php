<?php

namespace App\Http\Requests\V1\Tags;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:190'],
            'type' => ['sometimes', 'in:category,service'],
        ];
    }
}
