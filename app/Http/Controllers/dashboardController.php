<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class dashboardController extends Controller
{
    //

    public function index()
    {
        return view('pages.dashboard');
    }
}
