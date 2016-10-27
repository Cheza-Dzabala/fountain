<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loanSecurities extends Model
{
    //
    protected $table = 'loanSecurities';

    protected $fillable = [
        'loanId', 'securityImage'
    ];
}
