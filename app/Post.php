<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Post extends Model implements ViewableContract
{
    use Viewable;
    protected $fillable = [
    	'title','content','category_id','tags','published_on','slug','image','user_id'
    ];

     public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comments(){
    	return $this->hasMany('App\Comment');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
