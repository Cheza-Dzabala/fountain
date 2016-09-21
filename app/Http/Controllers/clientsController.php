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
        $clientClass = new clientsClass();
        $clients = $clientClass->clientIndex();
        return $clients;
    }


    public function newClient()
    {
        $clientClass = new clientsClass();
        $clientDependencies = $clientClass->createClient();
        return $clientDependencies;
    }

    public function saveClient(Request $request)
    {
        $clientClass = new clientsClass();
        $saveClient = $clientClass->saveClient($request);
        return $saveClient;
    }

    public function viewClient($id)
    {
        $clientClass = new clientsClass();
        $client = $clientClass->viewClient($id);
        return $client;

    }
}
