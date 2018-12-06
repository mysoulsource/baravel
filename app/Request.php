<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Request extends Model
{
    //to softdelete the request
    use SoftDeletes;
    //column name where date time of deleted is stored
    protected $dates = ['deleted_at'];
    protected $table = 'request';


    protected $fillable =[
        'requested_by','requested_to','status','code','date','message','urgency'
    ];

    //function to get the name of requested id
    public function requestedToName(){
        return $this->belongsTo('App\User','requested_to');
    }
    //function to get the name of id who requested
    public function requestedByName(){
        return $this->belongsTo('App\User','requested_by');
    }
}
