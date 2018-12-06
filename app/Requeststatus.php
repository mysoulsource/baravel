<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requeststatus extends Model
{
    //model to keep the records of request
    protected $table = 'requeststatus';
    protected $fillable = [
      'request_id','status','message'
    ];
}
