<?php

namespace App\Http\Requests\Sale;

use App\Rules\PositiveInventory;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'info' => ['required'],
            'info.customer_name' => ['required', 'string', 'max:255'],
            'info.discount' => ['required', 'numeric'],
            'info.remarks' => ['nullable', 'string', 'max:255'],
            'details' => ['required', 'array'],
            'details.*.product_id' => ['required', 'integer', 'exists:products,id'],
            'details.*.price' => ['required', 'numeric'],
            'details.*.qty' => ['required', 'numeric', new PositiveInventory],
            'details.remarks' => ['nullable', 'string', 'max:255'],
        ];
    }
}
