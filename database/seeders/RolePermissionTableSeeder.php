<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminPermission = Permission::whereIn('name',[
            'dashboard','role_list','role_create','role_store','role_edit','role_update','role_destory',
            'permission_list','permission_create','permission_store','permission_edit','permission_update','permission_destory',
            'user_list','user_create','user_edit','user_store','user_update','user_destory',
            'category_list','category_create','category_store','category_edit','category_update','category_destory'
        ])->pluck('name');
       
        $role1 = Role::find(1);
        $role1->syncPermissions($adminPermission);

        $managerPermission = Permission::whereIn('name',[
            'category_list','category_create','category_store','category_edit','category_update','category_destory' 
        ])->pluck('name');
        $role2 = Role::find(2);
        $role2->syncPermissions($managerPermission);

        
    }
}
