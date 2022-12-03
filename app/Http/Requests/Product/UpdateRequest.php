<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'info' => ['required'],
            'info.category_id' => ['required', 'integer', 'exists:categories,id'],
            'info.name' => ['required', 'string', 'max:255', 'unique:products,name,' . $this->route('product')],
            'info.remarks' => ['nullable', 'string', 'max:255'],
            'info.inventory' => ['required', 'numeric'],
            'info.photo_url' => ['nullable', 'string', 'max:255'],
            'prices' => ['required'],
            'prices.purchase_price' => ['required', 'numeric'],
            'prices.selling_price' => ['required', 'numeric'],
            'uoms' => ['required', 'array'],
            'uoms.*.uom_id' => ['required', 'integer', 'exists:uoms,id'],
            'uoms.*.qty' => ['required', 'integer'],
        ];
    }
}
