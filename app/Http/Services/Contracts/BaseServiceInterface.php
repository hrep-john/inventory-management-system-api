<?php

namespace App\Http\Services\Contracts;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
* Interface BaseServiceInterface
* @package App\Services\Contracts
*/
interface BaseServiceInterface
{
    public function all(): Collection;
    public function paginate(): LengthAwarePaginator;
    public function store($attributes): Model;
    public function update(array $attributes, Model $model): Model;
    public function delete(Model $model): Model;
    public function find($id);
    public function findMany(Array $ids): Collection;
}
