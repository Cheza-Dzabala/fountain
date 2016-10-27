<?php

namespace App\Http\Controllers;


use App\applicationStatus;
use App\Classes\websystem\settings\rolesPermissions\permissionsClass;
use App\Classes\websystem\settings\rolesPermissions\rolesClass;
use App\Classes\websystem\settings\clients\idsClass;
use App\Classes\websystem\settings\clients\locationsClass;
use App\Classes\websystem\settings\loanSecurities\loanSecurityClass;
use App\Classes\websystem\settings\loanTypes\loanTypeClass;
use App\loanTypes;
use App\Role;
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


    /*
     * LOANING MODULE SETTINGS
     * */

    public function loanTypes()
    {
        $LoanTypeClass = new loanTypeClass();
        $loanTypes = $LoanTypeClass->loanTypes();
        return $loanTypes;
    }

    public function saveLoanType(Requests\newLoanTypeRequest $request)
    {
        $LoanTypeClass = new loanTypeClass();
        $newLoanType = $LoanTypeClass->saveLoanType($request);
        return $newLoanType;
    }

    public function deleteLoanType($id)
    {
        $LoanTypeClass = new loanTypeClass();
        $deleteLoanType = $LoanTypeClass->deleteLoanType($id);
        return $deleteLoanType;
    }

    public function editLoanType($name)
    {
        $LoanTypeClass = new loanTypeClass();
        $editLoanType = $LoanTypeClass->editLoanType($name);
        return $editLoanType;
    }

    public function updateLoanType(Request $request, $id)
    {
        $LoanTypeClass = new loanTypeClass();
        $updateType = $LoanTypeClass->updateLoanType($request, $id);
        return $updateType;
    }


    public function loanSecurity()
    {
        $securitiesClass = new loanSecurityClass();
        $loanSecurity = $securitiesClass->loanSecurity();
        return $loanSecurity;
    }

    public function saveNew(Requests\newLoanSecurities $request)
    {
        $securitiesClass = new loanSecurityClass();
        $newSecurity = $securitiesClass->saveNew($request);
        return $newSecurity;
    }

    public function deleteSecurity($id)
    {
        $securitiesClass = new loanSecurityClass();
        $deleteSecurity = $securitiesClass->deleteSecurity($id);
        return $deleteSecurity;

    }

    public function editSecurity($name)
    {
        $securitiesClass = new loanSecurityClass();
        $edit = $securitiesClass->editSecurity($name);
        return $edit;
    }

    public function updateSecurity(Request $request, $id)
    {

        $securitiesClass = new loanSecurityClass();
        $update = $securitiesClass->updateSecurity($request, $id);
        return $update;
    }
    /**
     * @return idsClass
     */

    public function applicationStatuses()
    {
        $applicationStatuses = applicationStatus::get();
        return view('settings.loans.applicationStatuses.index', compact('applicationStatuses'));
    }

    public function applicationStatusNew(Request $request)
    {
        applicationStatus::create([
            'name' => $request->name,
        ]);
        return redirect()->route('settings.applicationStatuses');
    }

    public function applicationStatusDelete($id)
    {
        $application = applicationStatus::whereId($id)->first();
        $application->delete();

        return redirect()->route('settings.applicationStatuses');
    }

    public function roles()
    {
        $rolesClass = new rolesClass();
        $roles = $rolesClass->index();
        return $roles;
    }

    public function saveRole(Request $request)
    {
        $rolesClass = new rolesClass();
        $newRole = $rolesClass->saveRole($request);
        return $newRole;
    }

    public function setPermissions($id)
    {
        $permissionClass = new permissionsClass();
        $permission = $permissionClass->Permissions($id);
        return $permission;
    }

    public function savePermissions(Request $request, $id)
    {
        $permissionClass = new permissionsClass();
        $attachPermissions = $permissionClass->savePermissions($request, $id);
        return $attachPermissions;
    }

    private function initializeIdClass()
    {
        $idsClass = new idsClass();
        return $idsClass;
    }




}
