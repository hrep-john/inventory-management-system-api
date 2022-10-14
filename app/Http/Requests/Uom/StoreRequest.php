<?php

namespace App\Http\Requests\Uom;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'unique:uoms,code'],
            'name' => ['required', 'string', 'max:255', 'unique:uoms,name'],
            'remarks' => ['nullable', 'string', 'max:255'],
        ];
    }
}
