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
            'info.code' => ['required', 'string', 'max:255', 'unique:products,code,' . $this->route('product')],
            'info.name' => ['required', 'string', 'max:255', 'unique:products,name,' . $this->route('product')],
            'info.remarks' => ['nullable', 'string', 'max:255'],
            'info.inventory' => ['required', 'integer'],
            'prices' => ['required'],
            'prices.purchase_price' => ['required', 'integer'],
            'prices.selling_price' => ['required', 'integer'],
            'uoms' => ['required', 'array'],
            'uoms.*.uom_id' => ['required', 'integer', 'exists:uoms,id'],
            'uoms.*.qty' => ['required', 'integer'],
        ];
    }
}
