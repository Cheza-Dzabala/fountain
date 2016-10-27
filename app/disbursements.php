<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class disbursements extends Model
{
    //
    protected $table = 'disbursements';

    protected $fillable = [
     'loanId', 'disbursedAmount', 'disbursedBy', 'chequeNumber', 'date'
    ];
}
