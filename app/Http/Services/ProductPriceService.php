<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\ProductPriceServiceInterface;
use App\Models\ProductPrice;

class ProductPriceService extends BaseService implements ProductPriceServiceInterface
{
    /**
    * ProductPriceService constructor.
    *
    * @param ProductPrice $model
    */
    public function __construct(ProductPrice $model)
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
