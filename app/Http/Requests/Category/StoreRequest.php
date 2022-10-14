<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'unique:categories,code'],
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
            'remarks' => ['nullable', 'string', 'max:255'],
        ];
    }
}
