<?php

namespace App\Http\Controllers;

use App\Classes\websystem\users\usersClass;
use Illuminate\Http\Request;

use App\Http\Requests;

class usersController extends Controller
{
    //

    public function newUser()
    {
        $userClass = new usersClass();
        $new = $userClass->newUser();
        return $new;
    }

    public function saveUser(Requests\newUserRequest $request)
    {
        $userClass = new usersClass();
        $saveUser = $userClass->saveUser($request);
        return $saveUser;
    }
}
