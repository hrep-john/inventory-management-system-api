<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Http\Services\Contracts\ProductServiceInterface::class, \App\Http\Services\ProductService::class);
        $this->app->bind(\App\Http\Services\Contracts\CategoryServiceInterface::class, \App\Http\Services\CategoryService::class);
        $this->app->bind(\App\Http\Services\Contracts\UomServiceInterface::class, \App\Http\Services\UomService::class);
    }
}
