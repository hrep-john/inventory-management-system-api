<?php

namespace App\Models;

use App\Casts\Money;

class ProductPrice extends BaseModel
{
    protected $fillable = [
        'product_id',
        'purchase_price',
        'selling_price',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'purchase_price' => Money::class,
        'selling_price' => Money::class,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
