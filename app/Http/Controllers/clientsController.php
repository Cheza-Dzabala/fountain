<?php

namespace App\Http\Controllers;

use App\Classes\websystem\clientsClass;
use Illuminate\Http\Request;

use App\Http\Requests;

class clientsController extends Controller
{
    //
    public function index()
    {
        return view('clients.index');
    }


    public function newClient()
    {
        $clientClass = new clientsClass();
        $clientDependencies = $clientClass->createClient();
        return $clientDependencies;

    }
}
