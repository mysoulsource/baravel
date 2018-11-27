<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $fillable = [
        'title','blood','detail','date','accepted_by','code','status','added_by','location','urgency'
    ];


    public function bloodName(){

        return $this->belongsTo('App\Blood','blood');
    }

}
