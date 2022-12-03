<?php

namespace App\Http\Resources\PurchasesDetail;

use Illuminate\Http\Resources\Json\JsonResource;

class BasicResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
