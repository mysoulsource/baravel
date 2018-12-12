<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =[
    	'post_id','user_id','content','user_id'
    ];

    public function post(){
    	return $this->belongsTo('App\Post');
    }
}
