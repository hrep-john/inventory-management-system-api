<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends BaseModel
{
    protected $fillable = [
        'category_id',
        'code',
        'name',
        'remarks',
        'created_by',
        'updated_by',
        'inventory',
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
            'inventory' => $this->inventory,
            'photo_url' => $this->photo_url,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    protected function inventory(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($value / 100),
            set: fn ($value) => ($value * 100),
        );
    }
}
