<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    //
    protected $table = 'locations';

    protected $fillable =
        [
            'name', 'isActive'
        ];
}
