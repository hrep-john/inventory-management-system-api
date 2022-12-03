<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;

class BasicResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
