<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requeststatus extends Model
{
    protected $table = 'requeststatus';
    protected $fillable = [
      'request_id','status','message'
    ];
}
