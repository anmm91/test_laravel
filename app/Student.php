<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['name'];
    public function course(){
        return $this->belongsTo('App\Course');
    }
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
}
