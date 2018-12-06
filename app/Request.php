<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Request extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'request';
    protected $fillable =[
        'requested_by','requested_to','status','code','date','message','urgency'
    ];


    public function requestedToName(){
        return $this->belongsTo('App\User','requested_to');
    }
    public function requestedByName(){
        return $this->belongsTo('App\User','requested_by');
    }
}
