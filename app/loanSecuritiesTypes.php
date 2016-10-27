<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loanSecuritiesTypes extends Model
{
    //
    protected $table = 'loanSecurityTypes';

    protected $fillable = [
        'name', 'isActive'
    ];
}
