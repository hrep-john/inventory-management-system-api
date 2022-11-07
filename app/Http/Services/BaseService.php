<?php   

namespace App\Http\Services;

use App\Http\Services\Contracts\BaseServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DatabaseTransaction;
use App\Traits\FilterRebuild;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class BaseService implements BaseServiceInterface
{     
    use DatabaseTransaction, FilterRebuild;

    /**      
     * @var Model      
     */     
    protected $model;       

    /**      
     * BaseService constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct($model)     
    {         
        $this->model = $model;
    }

    public function all(): Collection
    {
        $filters = request()->get('filters', []);

        $model = $this->model;

        foreach($filters as $filter) {
            $filter = JSON_DECODE($filter);
            $method = Str::lower($filter->join) === 'or' ? 'orWhere' : 'where';
            $model = $model->{$method}($filter->column, $filter->operator, $filter->value);
        }

        return $model->get();    
    }

    public function paginate(): LengthAwarePaginator
    {
        $perPage = request()->get('per_page', 10);
        $filters = request()->get('filters', []);

        $model = $this->model;

        foreach($filters as $filter) {
            $filter = $this->rebuild((object) $filter);
            $join = $filter->join ?? 'and';
            $method = Str::lower($join) === 'or' ? 'orWhere' : 'where';
            $model = $model->{$method}($filter->column, $filter->operator, $filter->value);
        }

        return $model->paginate($perPage);
    }

    public function store($attributes): Model
    {
        $that = $this;

        $data = array_merge($this->formatAttributes($attributes), [
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        return $this->transaction(function() use ($data, $attributes, $that) {
            $model = $that->model->create($data);
            $that->afterStored($model, $attributes);

            return $this->model->find($model->id);
        });
    }

    public function update(array $attributes, Model $model): Model
    {
        $that = $this;

        $data = array_merge($this->formatAttributes($attributes), [
            'updated_by' => auth()->user()->id,
        ]);

        return $this->transaction(function() use ($data, $attributes, $model, $that) {
            $model->update($data);
            $that->afterUpdated($model, $attributes);

            return $model;
        });
    }

    public function delete(Model $model): Model
    {
        $that = $this;

        return $this->transaction(function() use ($model, $that) {
            $model->delete();
            $that->afterDeleted($model);

            return $model;
        });
    }

    public function find($id)
    {
        $model = $this->model->find($id);

        return $model;
    }

    public function findMany(Array $ids): Collection
    {
        return $this->model->findMany($ids);
    }

    // Custom Hooks

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