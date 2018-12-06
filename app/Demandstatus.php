<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demandstatus extends Model
{
    //model to keep the record of demands
    protected $table = 'demandstatus';

   protected $fillable =[
        'demand_id','status','message'
   ];
}
