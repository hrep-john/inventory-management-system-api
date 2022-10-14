<?php

namespace Database\Seeders;

use App\Models\User;
use App\Traits\Seedable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminUserSeeder extends Seeder
{
    use Seedable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($this->hasSeeder($this::class)) {
            return false;
        }

        $user = User::create([
            'email'         => 'superadmin@gmail.com',
            'username'  => 'super-admin',
            'name'          => 'super-admin user',
            'password'   => Hash::make('super-admin-2022'),
        ]);

        $user->assignRole('super-admin');

        $user = User::create([
            'email'         => 'admin@gmail.com',
            'username'  => 'admin',
            'name'          => 'admin user',
            'password'   => Hash::make('admin-2022'),
        ]);

        $user->assignRole('admin');

        $this->seed($this::class);
    }
}
