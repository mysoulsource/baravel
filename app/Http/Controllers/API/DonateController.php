<?php

namespace App\Http\Controllers\API;

use App\Events\SendResponseEvent;
use App\Jobs\SendResponseMailJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Request as Donate;
use App\Requeststatus;


class DonateController extends Controller
{
    /**
     *  NOTE: App\Request used as Donate
     *  methods used :
     *              index : send all the request got by user
     *              accept: fire this function if accpeted by user.(mail and pusher)
     *              decline: fire this function if declined by user.(mail and delete the request)
     * To do: Roles and send only limited data
     */
    public function index()
    {
        $donate = Donate::with('requestedByName:id,name')
                ->where('requested_to','=',auth('api')->user()->id)
                ->where('status','=',0)
                ->get();
        return $donate;
    }



    //function to accpet the donation request
    public function  accept(Request $request){
        //find the donation request
        $donate = Donate::findOrFail($request->did);
        //if exists
        if($donate){
            //update the data
            $donate->update([
                'status' => 1,
                'code'=>str_random(16),
                'message' => 'Accpeted'
            ]);
            //update the request status table data
            Requeststatus::create([
                'request_id' => $donate->id,
                'status' => 1,
                'message'=>''
            ]);
            //fire the event(email and pusher)
            event(new SendResponseEvent($donate));

        }
    }
    public function  decline(Request $request){
        //find the donation request
        $donate = Donate::findOrFail($request->did);
        //if exists
        if($donate){
            //update the request status table data
            Requeststatus::create([
                'request_id' => $donate->id,
                'status' => 0,
                'message'=>'Declined'
            ]);
            //delete the request
            $donate->delete();
            //fire the email
            dispatch(new SendResponseMailJob($donate));

        }
    }

}
