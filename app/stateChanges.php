<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stateChanges extends Model
{
    //
    protected $table = 'stateChanges';

    protected $fillable = [
        'loanId', 'statusId', 'moderatorId', 'moderatorComments'
    ];
}
