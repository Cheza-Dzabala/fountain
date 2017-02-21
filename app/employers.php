<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employers extends Model
{
    //
    protected $table = 'employers';

    protected  $fillable = [
      'name', 'contactPerson', 'primaryContactNumber', 'secondaryContactNumber', 'physicalAddress', 'postalAddress',
        'emailAddress', 'createdBy', 'registration_number'
    ];


}
