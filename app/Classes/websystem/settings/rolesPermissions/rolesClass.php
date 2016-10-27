<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 10/4/16
 * Time: 10:37 AM
 */

namespace App\Classes\websystem\settings\rolesPermissions;


use App\Role;
use Illuminate\Http\Request;

class rolesClass
{
    public function index()
    {
        $roles = Role::get();
        return view('settings.users.roles-permissions.index', compact('roles'));
    }

    public function saveRole(Request $request)
    {
        $input = $request->all();

        $role = new Role();
        $role->fill($input);
        $role->save();
        return redirect()->route('settings.users.roles-and-permissions');

    }

}