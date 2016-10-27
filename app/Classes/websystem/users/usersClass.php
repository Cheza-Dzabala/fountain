<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 10/3/16
 * Time: 9:49 PM
 */

namespace App\Classes\websystem\users;


use App\Http\Requests\newUserRequest;
use App\Role;
use App\User;

class usersClass
{
    public function newUser()
    {
        $roles = Role::get();
        return view('users.new', compact('roles'));
    }


    public function saveUser(newUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->attachRole($request->role);
        return redirect()->route('users.new');
    }
}