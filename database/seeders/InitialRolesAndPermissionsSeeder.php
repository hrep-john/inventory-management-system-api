<?php

namespace Database\Seeders;

use App\Traits\Seedable;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InitialRolesAndPermissionsSeeder extends Seeder
{
    use Seedable;

    public function run()
    {
        if ($this->hasSeeder($this::class)) {
            return false;
        }

        $permissions = [
            'General: Login',
            'General: Logout',
            'Product: View',
            'Product: Create',
            'Product: Edit',
            'Product: Delete',
        ];

        foreach($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        $roles = [
            'super-admin',
            'admin',
            'regular',
        ];

        foreach($roles as $role) {
            $role = Role::create([
                'name' => $role,
            ]);

            $role->givePermissionTo($permissions);
        }

        $this->seed($this::class);
    }
}
