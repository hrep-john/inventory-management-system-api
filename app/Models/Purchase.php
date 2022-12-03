<?php

namespace App\Models;

use App\Casts\Money;

class Purchase extends BaseModel
{
    protected $fillable = [
        'supplier_name',
        'subtotal_amount',
        'discount',
        'total_amount',
        'remarks',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'subtotal_amount' => Money::class,
        'discount' => Money::class,
        'total_amount' => Money::class,
    ];

    public function details()
    {
        return $this->hasMany(PurchasesDetail::class, 'transaction_id', 'id');
    }

    public function getInfoAttribute() 
    {
        $columns = array_merge([
            'id', 
            'created_at', 
            'updated_at'
        ], $this->fillable);

        return $this->only($columns);
    }
}
