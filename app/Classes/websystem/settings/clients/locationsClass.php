<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 9/21/16
 * Time: 10:40 AM
 */

namespace App\Classes\websystem\settings\clients;


use App\Http\Requests\newLocationRequest;
use App\locations;
use Illuminate\Http\Request;

class locationsClass
{
    public function allLocations()
    {
        $locations = locations::get();
        return view('settings.clients.locations.locations', compact('locations'));
    }

    public function saveNewLocation(newLocationRequest $request)
    {
        locations::create([
            'name' => $request->name,
            'isActive' => $request->isActive
        ]);
        return redirect()->route('settings.clients.locations');
    }

    public function deleteLocation($id)
    {
        $location = locations::whereId($id)->first();
        $location->delete();
        return redirect()->route('settings.clients.locations');
    }

    public function editLocation($name)
    {
        $location = locations::whereName($name)->first();
        return view('settings.clients.locations.edit', compact('location'));
    }

    public function updateLocation(Request $request, $id)
    {
        $input = $request->all();
        $location = locations::whereId($id)->first();
        $location->fill($input);
        $location->save();
        return redirect()->route('settings.clients.locations');
    }
}