<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\TransactionServiceInterface;
use App\Models\Transaction;

class TransactionService extends BaseService implements TransactionServiceInterface
{
    /**
    * TransactionService constructor.
    *
    * @param Transaction $model
    */
    public function __construct(Transaction $model)
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
