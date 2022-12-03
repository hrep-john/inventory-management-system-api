<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;

class FullResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
