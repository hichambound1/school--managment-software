<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=[
            'super admin',
            'admin',
            'client super admin',
            'client admin',
            'assistent',
            'teacher',
            'parent',
            'driver',
            'student',
        ];
        $permissions=[
            //user
            "can_view_user",
            "can_add_user",
            "can_edit_user",
            "can_delete_user",
            //role
            "can_view_role",
            "can_delete_role",
            "can_edit_role",
            "can_add_role",
            //permissions
            "can_view_permission",
            "can_add_permission",
            "can_edit_permission",
            "can_delete_permission",
            //city
            "can_view_city",
            "can_add_city",
            "can_edit_city",
            "can_delete_city",
            //country
            "can_view_country",
            "can_add_country",
            "can_edit_country",
            "can_delete_country",
            //language
            "can_view_language",
            "can_add_language",
            "can_edit_language",
            "can_delete_language",
            //plan
            "can_view_plan",
            "can_add_plan",
            "can_edit_plan",
            "can_delete_plan",
            //option
            "can_add_option",
            "can_view_option",
            "can_edit_option",
            "can_delete_option",
        ];

        foreach ($permissions as $permission) {
            $old_permission= Permission::where('name',$permission)->first();
            if(!isset($old_permission)){
                Permission::create(['name' => $permission]);
            }
        }
        foreach ($roles as $role_name) {
            $role= Role::where('name',$role_name)->first();
            if(!isset($role)){
                $role = Role::create(['name' => $role_name]);
            }
            if($role_name==='super admin'){
                $role->syncPermissions($permissions);
            }
        }

    }
}
