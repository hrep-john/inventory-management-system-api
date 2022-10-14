<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\CategoryServiceInterface;
use App\Models\Category;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    /**
    * CategoryService constructor.
    *
    * @param Category $model
    */
    public function __construct(Category $model)
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
