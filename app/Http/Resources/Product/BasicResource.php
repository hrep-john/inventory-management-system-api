<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class BasicResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name,
            'code' => $this->code,
            'name' => $this->name,
            'remarks' => $this->remarks,
            'purchase_price' => $this->prices->purchase_price,
            'selling_price' => $this->prices->selling_price,
            'inventory' => $this->inventory,
            'photo_url' => $this->photo_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
