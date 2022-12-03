<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\PurchasesDetailServiceInterface;
use App\Models\PurchasesDetail;

class PurchasesDetailService extends BaseService implements PurchasesDetailServiceInterface
{
    /**
    * PurchasesDetailService constructor.
    *
    * @param PurchasesDetail $model
    */
    public function __construct(PurchasesDetail $model)
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
