<?php

namespace App\Http\Services\Contracts;

interface ProductServiceInterface extends BaseServiceInterface
{
    public function uploadPhoto($photo);
}
