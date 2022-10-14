<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\ProductServiceInterface;
use App\Models\Product;

class ProductService extends BaseService implements ProductServiceInterface
{
    /**
    * ProductService constructor.
    *
    * @param Product $model
    */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    protected function formatAttributes($attributes): array
    {
        return $attributes['info'];
    }

    protected function afterStored($model, $attributes): void
    {
        $model->prices()->create($attributes['prices']);
        $model->uoms()->attach($attributes['uoms']);
    }

    protected function afterShown($model): void
    {
        
    }

    protected function afterUpdated($model, $attributes): void
    {
        $model->prices()->update($attributes['prices']);
        $model->uoms()->attach($attributes['uoms']);
    }

    protected function afterDeleted($model): void
    {
        $model->prices()->delete();
        $model->uoms()->detach();
    }
}
