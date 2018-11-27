<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demandstatus extends Model
{
    protected $table = 'demandstatus';

   protected $fillable =[
        'demand_id','status','message'
   ];
}
