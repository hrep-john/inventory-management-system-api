<?php

namespace App\Http\Requests\Uom;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'unique:uoms,code,' . $this->route('uom')],
            'name' => ['required', 'string', 'max:255', 'unique:uoms,name,' . $this->route('uom')],
            'remarks' => ['nullable', 'string', 'max:255'],
        ];
    }
}
