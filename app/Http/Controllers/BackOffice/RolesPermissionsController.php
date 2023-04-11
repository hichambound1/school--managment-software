<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackOffice\RolePermissions\StorePermission;
use App\Http\Requests\BackOffice\RolePermissions\UpdatePermission;
use App\Http\Requests\BackOffice\RolePermissions\storeRole;
use App\Http\Requests\BackOffice\RolePermissions\syncRolePermissions;
use App\Http\Requests\BackOffice\RolePermissions\updateRole;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsController extends Controller
{
    public function getAll()
    {
        $roles= Role::with('permissions')->get();
        return response($roles,200);
    }
    public function getOne($id)
    {
        $role= Role::where('id',$id)->with('permissions')->first();

        if(isset($role)){
            return response($role,200);
        }else{
            return response('role not found',404);
        }
    }
    public function storeRole(storeRole $request)
    {
        $role = Role::create(['name' => $request->role_name]);
        return response($role,200);
    }
    public function updateRole(updateRole $request)
    {
        $role = Role::where('id',$request->id)->update(['name' => $request->role_name]);
        return response('role name updated',200);
    }
    public function syncPermissions(syncRolePermissions $request)
    {
        if(!isset($request->permissions)){
            if(!is_array($request->permissions)){
                return response("permissions should be an array",422);
            }
            return response("permissions table is required",422);
        }

        foreach ($request->permissions as $key =>$permission) {
            $current_permission= Permission::where('id', $permission)->first();
            if(!isset($current_permission)){
                $key=$key+1;
                return response("permission number ".$key." not exsit in owr database",422);
            }
        }
        $role= Role::where('id',$request->role_id)->first();
        $role->syncPermissions($request->permissions);
        return response("permission and role are synchronized",200);
    }
    public function allPermissions()
    {
        $permissions= Permission::get();
        return response($permissions,200);
    }
    public function GetPermission($id)
    {
        $permission= Permission::where('id',$id)->first();
        if(isset($permission)){
            return response($permission,200);
        }else{
            return response("NO PERMISSION WITH THIS NAME",404);

        }
    }
    public function storePermission(StorePermission $request)
    {
        $permission = Permission::create(['name' => $request->permission_name]);
        return response($permission,200);
    }
    public function updatePermission(UpdatePermission $request)
    {
        $permission = Permission::where('id',$request->id)->update(['name' => $request->permission_name]);
        return response("permission updated",200);
    }
}
