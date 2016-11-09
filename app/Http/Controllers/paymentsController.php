<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class paymentsController extends Controller
{
    //
    public function due()
    {
        return view('payments.due');
    }
}
