<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loanTypes extends Model
{
    //
    protected $table = 'loanTypes';

    protected $fillable = [
        'name', 'interestRate', 'requiresEmployerConsent', 'isActive', 'description'
    ];
}
