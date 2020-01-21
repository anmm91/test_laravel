<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=['name'];
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
    public function student(){
        return $this->hasOne('App\Student');
    }
}
