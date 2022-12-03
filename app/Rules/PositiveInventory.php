<?php

namespace App\Rules;

use App\Models\Product;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Str;

class PositiveInventory implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $productId = request(Str::replaceLast('qty', 'product_id', $attribute));
        $currentInventory = Product::find($productId)->inventory;

        if ($currentInventory - $value < 0) {
            $fail(sprintf('The :attribute must be less than or equal to the current inventory. Current inventory is %s.', $currentInventory));
        }
    }
}
