<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class GenerateBasicCrudCommand extends Command
{
    protected $signature = 'generate:basic-crud {name}';

    protected $description = '
        Generate a basic crud. This will generate the followings:  
            a) Migration
            b) Model
            c) Factory
            d) Controller
            e) Service
            f) Service Interface
            g) Store Request
            h) Update Request
            i) Basic Resource
            j) Full Resource
    ';

    public function handle()
    {
        $name = ucwords($this->argument('name'));

        Artisan::call(sprintf('make:migration "create %s table"', Str::plural(Str::lower($name))));
        Artisan::call(sprintf('make:model %s', $name));
        Artisan::call(sprintf('make:factory %s', $name));
        Artisan::call(sprintf('make:controller Api/%sController --api --resource --model %s', $name, $name));
        Artisan::call(sprintf('make:service %s', $name));
        Artisan::call(sprintf('make:service-interface %s', $name));
        Artisan::call(sprintf('make:request %s/StoreRequest', $name));
        Artisan::call(sprintf('make:request %s/UpdateRequest', $name));
        Artisan::call(sprintf('make:resource %s/BasicResource', $name));
        Artisan::call(sprintf('make:resource %s/FullResource', $name));
    }
}
