<?php

namespace App\Http\Controllers;

use App\Classes\websystem\settings\clients\idsClass;
use App\Classes\websystem\settings\clients\locationsClass;
use Illuminate\Http\Request;

use App\Http\Requests;

class settingsController extends Controller
{
    //


    public function index()
    {
        return view('settings.index');
    }

    //Clients IDS
    public function clientsIds()
    {
        $idsClass = $this->initializeIdClass();
        $allIds = $idsClass->allIds();
        return $allIds;
    }

    public function saveNewIds(Requests\newIdsRequest $request)
    {
        $idsClass = $this->initializeIdClass();
        $saveid = $idsClass->saveNewIds($request);
        return $saveid;
    }

    public function deleteIds($id)
    {
        $idsClass = $this->initializeIdClass();
        $id = $idsClass->deleteIds($id);
        return $id;
    }

    public function editId($name)
    {
        $idsClass = $this->initializeIdClass();
        $id = $idsClass->editId($name);
        return $id;
    }

    public function updateId(Request $request, $id)
    {
        $idsClass = $this->initializeIdClass();
        $id = $idsClass->updateId($request, $id);
        return$id;
    }


    //Client Locations

    public function clientsLocations()
    {
        $locationClass = new locationsClass();
        $locations = $locationClass->allLocations();
        return $locations;
    }

    public function saveNewLocation(Requests\newLocationRequest $request)
    {
        $locationClass = new locationsClass();
        $newLocation = $locationClass->saveNewLocation($request);
        return $newLocation;
    }

    public function deleteLocation($id)
    {
        $locationClass = new locationsClass();
        $location = $locationClass->deleteLocation($id);
        return $location;
    }

    public function editLocation($name)
    {
        $locationClass = new locationsClass();
        $location = $locationClass->editLocation($name);
        return $location;
    }

    public function updateLocation(Request $request, $id)
    {
        $locationClass = new locationsClass();
        $location = $locationClass->updateLocation($request, $id);
        return $location;
    }

    /**
     * @return idsClass
     */
    private function initializeIdClass()
    {
        $idsClass = new idsClass();
        return $idsClass;
    }


}
