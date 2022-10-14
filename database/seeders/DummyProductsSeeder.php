<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\ProductUom;
use App\Models\Uom;
use Illuminate\Database\Seeder;

class DummyProductsSeeder extends Seeder
{
    public function run()
    {
        Product::factory()
            ->count(5)
            ->create()
            ->each(function($product) {
                $product->prices()->save(ProductPrice::factory()->make());
                $product->uoms()->attach($this->getAllProductUoms());
            });
    }

    protected function getAllProductUoms()
    {
        $data = [];

        foreach (Uom::cursor() as $uom) {
            $data[] = [
                'qty' => rand(1, 9999),
                'uom_id' => $uom->id,
            ];
        }

        return $data;
    }
}
