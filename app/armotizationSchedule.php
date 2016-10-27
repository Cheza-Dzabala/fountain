<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class armotizationSchedule extends Model
{
    //
    protected $table = 'amortizationSchedule';

    protected $fillable = [
       'loanId', 'settlementDate', 'principle', 'interest', 'isSettled', 'balance', 'total'
    ];
}
