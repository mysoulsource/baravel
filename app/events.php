<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    protected $fillable = [
        'title','organizer','detail','img','date','status','location','user_id'
    ];
}
