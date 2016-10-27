<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loans extends Model
{
    //
    protected $table = 'loans';

    protected $fillable = [
        'clientId',
        'loanType',
        'loanAmount',
        'loanRepaymentPeriod',
        'expectedDateOfCompletion',
        'applicationStatusId',
        'isActive',
        'recommendedBy',
        'createdBy',
        'recommendationNotes'
    ];
}
