<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

class ProductPrice extends BaseModel
{
    protected $fillable = [
        'product_id',
        'purchase_price',
        'selling_price',
        'created_by',
        'updated_by',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected function purchasePrice(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value / 100),
            set: fn ($value) => ($value * 100),
        );
    }

    protected function sellingPrice(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value / 100),
            set: fn ($value) => ($value * 100),
        );
    }
}
