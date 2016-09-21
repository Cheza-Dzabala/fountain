<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ids extends Model
{
    //
    protected $table = 'ids';

    protected $fillable = [
        'name', 'isAccepted'
    ];
}
