<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class FullResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
