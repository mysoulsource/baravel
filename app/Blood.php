<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    protected $fillable = [
        'name','detail','image'
    ];

    //relation to demands
    public function Demands(){
        return $this->hasMany('App\Demand');
    }
    public function users(){
        return $this->hasMany('App\User','blood');
    }
}
