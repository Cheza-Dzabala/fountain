<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicationStatus extends Model
{
    //
    protected $table = 'applicationStatus';

    protected $fillable = [
        'name'
    ];
}
