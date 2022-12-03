<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\SaleServiceInterface;
use App\Models\Sale;

class SaleService extends BaseService implements SaleServiceInterface
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

    protected function formatAttributes($attributes): array
    {
        $info = $attributes['info'];

        // compute subtotal amount by adding the product of price and qty
        $info['subtotal_amount'] = collect($attributes['details'])->sum(function ($item) {
            return $item['price'] * $item['qty'];
        });

        // compute total amount by subtracting subtotal amount and discount
        $info['total_amount'] = $info['subtotal_amount'] - $info['discount'];

        return $info;
    }

    protected function afterStored($model, $attributes): void
    {
        $details = collect($attributes['details'])->map(function ($item) {
            $item['created_by'] = auth()->user()->id;
            $item['updated_by'] = auth()->user()->id;
            return $item;
        });

        $model->details()->createMany($details);
    }

    protected function afterShown($model): void
    {
        
    }

    protected function afterUpdated($model, $attributes): void
    {
        $details = collect($attributes['details'])->map(function ($item) {
            $item['created_by'] = auth()->user()->id;
            $item['updated_by'] = auth()->user()->id;
            return $item;
        });

        $model->details()->delete();
        $model->details()->createMany($details);
    }

    protected function afterDeleted($model): void
    {
        $model->details()->delete();
    }
}
