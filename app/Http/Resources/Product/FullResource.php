<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class FullResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'info' => $this->info,
            'category' => $this->category,
            'prices' => $this->prices,
            'uoms' => $this->uoms,
        ];
    }
}
