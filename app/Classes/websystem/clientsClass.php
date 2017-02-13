<?php

namespace App\Classes\websystem;

use App\Clients;
use App\employers;
use App\employmentRecords;
use App\Events\Event;
use App\Events\newClientEvent;
use App\ids;
use App\locations;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class clientsClass {

    public function clientIndex()
    {
        $clients = Clients::get();

        foreach ($clients as $key => $value)
        {
            $location = locations::whereId($value->locationId)->first();
            $value->setAttribute('location', $location->name);
        }

        return view('clients.index', compact('clients'));
    }

    public function createClient()
    {
        $employers = employers::get();
        $ids = ids::whereIsaccepted('1')->get();
        $locations = locations::whereIsactive('1')->get();
        return view('clients.new', compact('employers', 'ids', 'locations'));
    }

    public function saveClient(Request $request)
    {
        list($client_save_path, $id_save_path) = $this->process_images($request);
        $client = $this->create_client($request, $client_save_path, $id_save_path);
        $this->create_employment_record($request, $client);
        return redirect()->route('clients');

    }

    public function viewClient($id)
    {
        $client = Clients::whereId($id)->first();
        $location = locations::whereId($client->locationId)->first();
        $addedBy = User::whereId($client->createdBy)->first();
        $idType = ids::whereId($client->idType)->first();
        $client->setAttribute('location_name', $location->name);
        $client->setAttribute('idType', $idType->name);
        $client->setAttribute('author', $addedBy->username);

        if($client->employer_id != null)
        {
            $employer = employers::whereId($client->employer_id)->first();
            $employmentRecord = employmentRecords::whereId($client->active_employment_record)->first();
            $client->setAttribute('employmentStart', $employmentRecord->employmentStartDate);
            $client->setAttribute('employmentEnd', $employmentRecord->employmentEndDate);
            $client->setAttribute('employer_name', $employer->name);
        }
        //dd($client);
        return view('clients.view', compact('client'));
    }



    /**
     * @param Request $request
     * @return array
     */
    private function process_images(Request $request)
    {
        if ($request->hasFile('clientImage')) {
            $file = $request->file('clientImage');
            $img = Image::make($file);
            $destinationPath = 'uploads/Clients/';
            $filename = str_random(32) . '.' . $file->getClientOriginalExtension();
            if(!file_exists($destinationPath)) \File::makeDirectory($destinationPath, 0777, true);
            $client_save_path = $destinationPath . $filename;
            $img->save($client_save_path, 60);
        }

        if ($request->hasFile('idImage')) {
            $file = $request->file('idImage');
            $img = Image::make($file);
            $destinationPath = 'uploads/Ids/';
            if(!file_exists($destinationPath)) \File::makeDirectory($destinationPath, 0777, true);
            $filename = str_random(32) . '.' . $file->getClientOriginalExtension();
            $id_save_path = $destinationPath . $filename;
            $img->save($id_save_path, 60);
            return array($client_save_path, $id_save_path);
        }
       // return array($client_save_path, $id_save_path);
    }

    /**
     * @param Request $request
     * @param $client_save_path
     * @param $id_save_path
     * @return static
     */
    private function create_client(Request $request, $client_save_path, $id_save_path)
    {
        $client = Clients::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'otherNames' => $request->otherNames,
            'dateOfBirth' => $request->dateOfBirth,
            'gender' => $request->gender,
            'clientImage' => $client_save_path,
            'primaryContactNumber' => $request->primaryContactNumber,
            'secondaryContactNumber' => $request->secondaryContactNumber,
            'primaryEmailAddress' => $request->primaryEmailAddress,
            'secondaryEmailAddress' => $request->secondaryEmailAddress,
            'physicalAddress' => $request->physicalAddress,
            'postalAddress' => $request->postalAddress,
            'locationId' => $request->locationId,
            'employmentStatus' => $request->employmentStatus,
            'bankName' => $request->bankName,
            'bankAccountName' => $request->bankAccountName,
            'bankAccountNumber' => $request->bankAccountNumber,
            'bankBranch' => $request->bankBranch,
            'idType' => $request->idType,
            'idNumber' => $request->idNumber,
            'dateIssued' => $request->dateIssued,
            'placeIssued' => $request->placeIssued,
            'expiryDate' => $request->expiryDate,
            'idImage' => $id_save_path,
            'createdBy' => Auth::user()['id'],
            'clientRemarks' => $request->clientRemarks,
        ]);

        event(new newClientEvent('New Client Created', $client->createdBy, '/clients/'.$client->id));

        return $client;
    }

    /**
     * @param Request $request
     * @param $client
     */
    private function create_employment_record(Request $request, $client)
    {
        if ($request->employmentStatus == '1') {

            $employmentRecord = employmentRecords::create([
                'client_id' => $client->id,
                'employer_id' => $request->employer_id,
                'employmentStartDate' => $request->employmentStartDate,
                'recordedBy' => Auth::user()['id'],
            ]);

            $client->employer_id = $request->employer_id;
            $client->active_employment_record = $employmentRecord->id;
            $client->save();
        }
    }


}

?>