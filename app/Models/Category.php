<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $fillable = [
        'code',
        'name',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public function category()
    {
        return $this->hasOne(Product::class);
    }
}
