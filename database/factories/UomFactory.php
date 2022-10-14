<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Uom;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Uom>
 */
class UomFactory extends Factory
{
    protected $model = Uom::class;

    public function definition()
    {
        $product = Product::first();

        return [
            'code' => 'sample code ' . Str::random(10),
            'product_id' => $product->id,
            'name' => 'Sample Rom ' . fake()->name(),
            'remarks' => 'Sample Remarks ',
        ];
    }
}
