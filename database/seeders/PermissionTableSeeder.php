<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'service-list',
            'service-create',
            'service-edit',
            'service-delete',
            'products-list',
            'products-create',
            'products-edit',
            'products-delete',
            'clients-list',
            'clients-create',
            'clients-edit',
            'clients-delete',
            'email-list',
            'email-create',
            'email-edit',
            'email-delete',
            'consults-list',
            'consults-create',
            'consults-edit',
            'consults-delete',
            'support-list',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
