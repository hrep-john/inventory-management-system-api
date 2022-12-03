<?php

namespace App\Models;

use App\Casts\Money;

class Transaction extends BaseModel
{
    protected $fillable = [
        'product_id',
        'price',
        'qty',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'price' => Money::class,
        'qty' => Money::class,
    ];

    /**
     * Get the parent transactionable model (user or post).
     */
    public function transactionable()
    {
        return $this->morphTo();
    }
}
