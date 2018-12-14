<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userdetail extends Model
{
    protected $fillable =[
    	'user_id','count'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
