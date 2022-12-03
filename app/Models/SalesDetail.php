<?php

namespace App\Models;

use App\Casts\Money;

class SalesDetail extends BaseModel
{
    protected $fillable = [
        'transaction_id',
        'product_id',
        'price',
        'qty',
        'remarks',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'price' => Money::class,
        'qty' => Money::class,
    ];

    public function info()
    {
        return $this->belongsTo(Purchase::class, 'id', 'transaction_id');
    }
}
