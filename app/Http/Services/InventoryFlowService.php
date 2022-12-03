<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\InventoryFlowServiceInterface;
use Illuminate\Database\Eloquent\Model;

class InventoryFlowService extends BaseService implements InventoryFlowServiceInterface
{
    /**
    * InventoryFlowService constructor.
    *
    * @param Model $model
    */
    public function __construct(Model $model)
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

        $details = $model->details()->createMany($details);
        $this->auditTransactions($details, 'create');
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

        $this->auditTransactions($model->details, 'delete');
        $model->details()->delete();

        $details = $model->details()->createMany($details);
        $this->auditTransactions($details, 'create');
    }

    protected function afterDeleted($model): void
    {
        $this->auditTransactions($model->details, 'delete');
        $model->details()->delete();
    }

    protected function auditTransactions($details, $event)
    {
        foreach ($details as $detail) {
            $detail->transaction()->{$event}($detail->toArray());
        }
    }
}
