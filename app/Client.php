<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=['name'];
    public function image(){
        return $this->morphOne('App\Image','imageable');
    }
}
