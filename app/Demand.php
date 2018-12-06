<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demand extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title','blood','detail','date','accepted_by','code','status','added_by','location','urgency'
    ];


    public function bloodName(){

        return $this->belongsTo('App\Blood','blood');
    }

}
