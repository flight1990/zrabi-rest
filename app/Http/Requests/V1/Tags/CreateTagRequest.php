<?php

namespace App\Http\Requests\V1\Tags;

use Illuminate\Foundation\Http\FormRequest;

class CreateTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:190'],
            'type' => ['required', 'in:category,service'],
        ];
    }
}
