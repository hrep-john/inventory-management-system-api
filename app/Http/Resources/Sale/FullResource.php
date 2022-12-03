<?php

namespace App\Http\Resources\Sale;

use Illuminate\Http\Resources\Json\JsonResource;

class FullResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'info'      => $this->info,
            'details' => $this->details
        ];
    }
}
