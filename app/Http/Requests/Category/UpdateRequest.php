<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'unique:categories,code,' . $this->route('category')],
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $this->route('category')],
            'remarks' => ['nullable', 'string', 'max:255'],
        ];
    }
}
