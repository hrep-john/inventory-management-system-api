<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'         => 'superadmin@gmail.com',
            'username'  => 'superadmin',
            'name'          => 'superadmin user',
            'password'   => Hash::make('super-admin-2022'),
            'user_level'  => 'superadmin'
        ]);

        User::create([
            'email'         => 'admin@gmail.com',
            'username'  => 'admin',
            'name'          => 'admin user',
            'password'   => Hash::make('admin-2022'),
            'user_level'  => 'admin'
        ]);
    }
}
