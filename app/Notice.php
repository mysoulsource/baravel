<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title','image','detail','updated_by','status'
    ];

    public function Updatedby(){
        return $this->belongsTo('App\User','updated_by');
    }
}
