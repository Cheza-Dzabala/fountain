<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;

use App\Http\Requests;

class apiController extends Controller
{
    //
    public function savePersonalDetails (Request $request)
    {
        dd($request);
        $client = Clients::whereId($request->clientID)->first();
        $client->firstName = $request->firstName;
        $client->lastName = $request->lastName;
        $client->otherNames = $request->otherNames;
        $client->dateOfBirth = $request->dateOfBirth;
        $client->gender = $request->gender;
        $client->save();

        return 'saved';
    }
}
