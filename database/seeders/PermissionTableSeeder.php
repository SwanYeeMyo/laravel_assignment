<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name' => 'dashboard',
                'guard_name' => 'web'
            ],
            [
                'name' => 'role_list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'role_create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'role_store',
                'guard_name' => 'web'
            ],
            [
                'name' => 'role_edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'role_update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'role_destory',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permission_list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permission_edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permission_create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permission_store',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permission_destory',
                'guard_name' => 'web'
            ],
          
            [
                'name' => 'category_list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'category_create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'category_edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'category_update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'category_destory',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user_list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user_create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user_store',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user_edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user_update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user_destory',
                'guard_name' => 'web'
            ]
        ];

        Permission::insert($data);
    }
}
