<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $permissions = ([
            [
                'name' => 'admin.dashboard',
                'description' => 'User Dashboard'
            ],
            [
                'name' => 'admin.pages.blank',
                'description' => 'Blank Page'
            ],
            [
                'name' => 'admin.pages.datatables',
                'description' => 'Datatables Page'
            ],
            [
                'name' => 'admin.pages.slick',
                'description' => 'Slick Page'
            ],
        ]);
        $roles = ([
            [
                'name' => 'superadmin',
                'description' => 'Super Admin',
                'permissions' => [
                    'admin.dashboard',
                    'admin.pages.blank',
                    'admin.pages.datatables',
                    'admin.pages.slick',
                ]
            ],
            [
                'name' => 'admin',
                'description' => 'Admin',
                'permissions' => [
                    'admin.dashboard',
                    'admin.pages.blank',
                    'admin.pages.datatables',
                    'admin.pages.slick',
                ]
            ],
            [
                'name' => 'user',
                'description' => 'User',
                'permissions' => [
                    'admin.dashboard',
                    'admin.pages.blank',
                ]
            ],
        ]);
        foreach ($permissions as $permission){
            Permission::create($permission);
        }
        foreach ($roles as $role){
            $permissions = $role['permissions'];
            unset($role['permissions']);
            $newRole = Role::create($role);
            $newRole->syncPermissions($permissions);
        }
    }
}
