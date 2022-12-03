<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $fillable = [
        'category_id',
        'code',
        'name',
        'remarks',
        'created_by',
        'updated_by',
        'photo_url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function uoms()
    {
        return $this->belongsToMany(Uom::class);
    }

    public function prices()
    {
        return $this->hasOne(ProductPrice::class);
    }

    public function getInfoAttribute() 
    {
        $uom = $this->uoms->first();

        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'uom_id' => $uom?->id ?? null,
            'code' => $this->code,
            'name' => $this->name,
            'remarks' => $this->remarks,
            'photo_url' => $this->photo_url,
            'inventory' => $this->inventory,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getInventoryAttribute() 
    {
        $inventory = $this->transactions->sum(function ($item) {
            $multiplier = $item->transactionable_type === 'App\\Models\\SalesDetail' ? -1 : 1;

            return  $multiplier * $item['qty'];
        });

        return $inventory;
    }
}
