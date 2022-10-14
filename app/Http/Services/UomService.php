<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\UomServiceInterface;
use App\Models\Uom;

class UomService extends BaseService implements UomServiceInterface
{
    /**
    * UomService constructor.
    *
    * @param Uom $model
    */
    public function __construct(Uom $model)
    {
        parent::__construct($model);
    }

    protected function formatAttributes($attributes): array
    {
        return $attributes;
    }

    protected function afterStored($model, $attributes): void
    {
        
    }

    protected function afterShown($model): void
    {
        
    }

    protected function afterUpdated($model, $attributes): void
    {
        
    }

    protected function afterDeleted($model): void
    {
        
    }
}
