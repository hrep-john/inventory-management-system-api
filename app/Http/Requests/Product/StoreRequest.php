<?php

namespace App\Http\Requests\Product;

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
            'info.category_id' => ['required', 'integer', 'exists:categories,id'],
            'info.name' => ['required', 'string', 'max:255', 'unique:products,name'],
            'info.remarks' => ['nullable', 'string', 'max:255'],
            'info.inventory' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'info.photo_url' => ['nullable', 'string', 'max:255'],
            'prices' => ['required'],
            'prices.purchase_price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'prices.selling_price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'uoms' => ['required', 'array'],
            'uoms.*.uom_id' => ['required', 'integer', 'exists:uoms,id'],
            'uoms.*.qty' => ['required', 'integer'],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'info.inventory.regex' => 'The decimal precision is up to two (2) decimal places only.',
            'prices.purchase_price.regex' => 'The decimal precision is up to two (2) decimal places only.',
            'prices.selling_price.regex' => 'The decimal precision is up to two (2) decimal places only.',
        ];
    }
}
