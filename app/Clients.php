<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    //
    protected $table = 'clients';

    protected $fillable = [
        'firstName',
        'lastName',
        'otherNames',
        'dateOfBirth',
        'gender',
        'clientImage',
        'primaryContactNumber',
        'secondaryContactNumber',
        'primaryEmailAddress',
        'secondaryEmailAddress',
        'physicalAddress',
        'postalAddress',
        'locationId',
        'employmentStatus',
        'bankName',
        'bankAccountName',
        'bankAccountNumber',
        'bankBranch',
        'idType',
        'idNumber',
        'dateIssued',
        'placeIssued',
        'expiryDate',
        'idImage',
        'createdBy',
        'employer_id',
        'clientRemarks',
        'active_employment_record',
    ];
}
