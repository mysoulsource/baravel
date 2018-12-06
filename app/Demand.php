<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demand extends Model
{
    //uses softdelete method
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'title','blood','detail','date','accepted_by','code','status','added_by','location','urgency'
    ];

    //get the name of the blood according to blood id
    public function bloodName(){

        return $this->belongsTo('App\Blood','blood');
    }

}
