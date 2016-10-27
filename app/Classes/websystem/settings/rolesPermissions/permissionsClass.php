<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 10/4/16
 * Time: 10:30 AM
 */

namespace App\Classes\websystem\settings\rolesPermissions;


use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class permissionsClass
{
    public function Permissions($id)
    {
        $role = Role::whereId($id)->first();
        $rolePerms = $role->perms()->get();
        $permissions = Permission::get();
        return view('settings.users.roles-permissions.permission', compact('role', 'permissions', 'rolePerms'));
    }

    public function savePermissions(Request $request, $id)
    {
        $role = Role::whereId($id)->first();
        if(isset($request->permission)){
            foreach ($request->permission as $permission)
            {
                $role->attachPermission($permission);
            }
        }

        return redirect()->route('settings.users.roles-and-permissions');

    }
}