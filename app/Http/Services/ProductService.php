<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\ProductServiceInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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

    public function uploadPhoto($photo)
    {
        return $this->transaction(function() use ($photo) {
            $name = time() . $photo->getClientOriginalName();
            $filePath = 'products/photo/' . $name;
            $path = Storage::disk('s3')->put($filePath, $photo);

            return Storage::disk('s3')->url($path);
        });
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
