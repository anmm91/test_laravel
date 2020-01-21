<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tennis extends Model
{
    protected $fillable = [
        'name', 'age','weight','length','nationality'
    ];
}
