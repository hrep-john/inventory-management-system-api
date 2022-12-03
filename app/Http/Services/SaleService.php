<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\SaleServiceInterface;
use App\Models\Sale;

class SaleService extends InventoryFlowService implements SaleServiceInterface
{
    /**
    * SaleService constructor.
    *
    * @param Sale $model
    */
    public function __construct(Sale $model)
    {
        parent::__construct($model);
    }
}
