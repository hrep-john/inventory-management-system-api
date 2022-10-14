<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $category = Category::first();

        return [
            'code' => 'sample code ' . Str::random(10),
            'category_id' => $category->id,
            'name' => 'Sample Product ' . fake()->name(),
            'remarks' => 'Sample Remarks ',
            'inventory' => rand(1,999)
        ];
    }
}
