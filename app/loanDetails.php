<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loanDetails extends Model
{
    //
   protected $table = 'loanDetails';

    protected $fillable = [
        'id',
        'loanApplicationId',
        'loanComments',
        'loanSecurityTypeId',
        'loanSecurityValue',
        'utilityBill',
        'securityDocument',
        'payslip_1',
        'payslip_2',
        'employerConsentForm',
    ];
}
