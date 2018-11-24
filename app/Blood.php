<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    protected $fillable = [
        'name','detail','image'
    ];
    public function Demands(){
        return $this->hasMany('App\Demand');
    }
}
