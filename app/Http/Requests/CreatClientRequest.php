<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatClientRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'firstName' => 'required',
            'lastName' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'primaryContactNumber' => 'required',
            'physicalAddress' => 'required',
            'postalAddress' => 'required',
            'locationId' => 'required',
            'employmentStatus' => 'required',
            'bankName' => 'required',
            'bankAccountName' => 'required',
            'bankAccountNumber' => 'required',
            'bankBranch' => 'required',
            'idType' => 'required',
            'idNumber' => 'required',
            'dateIssued' => 'required',
            'placeIssued' => 'required',
            'expiryDate' => 'required',
        ];
    }
}
