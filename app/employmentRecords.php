<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employmentRecords extends Model
{
    //
    protected $table = 'employmentRecords';

    protected $fillable =
        [
            'client_id', 'employer_id', 'employmentStartDate', 'employmentEndDate', 'recordedBy'
        ];
}
