<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function catogray(){
        return $this->belongsTo('App\Catogray');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
