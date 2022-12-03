<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\PurchaseServiceInterface;
use App\Models\Purchase;

class PurchaseService extends InventoryFlowService implements PurchaseServiceInterface
{
    /**
    * PurchaseService constructor.
    *
    * @param Purchase $model
    */
    public function __construct(Purchase $model)
    {
        parent::__construct($model);
    }
}
