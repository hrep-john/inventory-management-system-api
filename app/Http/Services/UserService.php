<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\UserServiceInterface;
use App\Models\User;

class UserService extends BaseService implements UserServiceInterface
{
    /**
    * UserService constructor.
    *
    * @param User $model
    */
    public function __construct(User $model)
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
