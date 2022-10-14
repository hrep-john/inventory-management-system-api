<?php

namespace App\Traits;

use App\Models\Seeder;

trait Seedable
{
    public function seed($class)
    {
        $last = Seeder::orderBy('id', 'desc')->count() 
            ? Seeder::orderBy('id', 'desc')->first()->batch
            : 0;

        Seeder::insert([
            'seeder' => $class,
            'batch' => $last + 1
        ]);
    }

    public function hasSeeder($name)
    {
        return Seeder::where('seeder', $name)->count() > 0;
    }
}