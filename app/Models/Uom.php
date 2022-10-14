<?php

namespace App\Models;

class Uom extends BaseModel
{
    protected $fillable = [
        'code',
        'name',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
