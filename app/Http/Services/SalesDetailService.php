<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\SalesDetailServiceInterface;
use App\Models\SalesDetail;

class SalesDetailService extends BaseService implements SalesDetailServiceInterface
{
    /**
    * SalesDetailService constructor.
    *
    * @param SalesDetail $model
    */
    public function __construct(SalesDetail $model)
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
