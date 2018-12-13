<?php

namespace App\Http\Controllers\API;

use App\Events\SendRequestEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Request as Requests;
use Mail;
use App\Mail\SendRequestMail;
use Auth;
use App\Jobs\SendRequestEmailJob;

class RequestController extends Controller
{
    /**
     * methods used :
     *              index : to send the request according to the logged in user
     *              store: to store the request data
     *
     * To do : If already made request . Decline
     *          Send limited data
     *          Role
     */
    public function index()
    {
        $requests = Requests::with('requestedToName:id,name')
            ->where('requested_by','=',auth('api')->user()->id)
            ->paginate(10);
       return $requests;
    }

  
    public function store(Request $request)
    {
        $this->validate($request,[
            'id' =>'required|integer|max:191',
            'date'=>'required|max:191',
            'urgency'=>'required|integer|max:191',
            'message'=>'required|max:500'
        ]);

        //search if the user has already requested to this user
        $prev_request = Requests::where('requested_by','=',auth('api')->user()->id)
            ->where('requested_to','=',$request->input('id'))
            ->get();
//       if($prev_request){
//           return response()->json([
//               'status' => 'error',
//               'msg'    => 'You have already Requested this User'
//           ], 422);
//       }else{

        //if not send a request
           $request = Requests::create([
               'requested_by'=> auth('api')->user()->id,
               'requested_to'=>$request->input('id'),
               'status'=>0,
               'date'=>$request->input('date'),
               'urgency'=>$request->input('urgency'),
               'message'=>$request->input('message')
           ]);
            //fire the event to send mail and live notification
           event(new SendRequestEvent($request));
       //}



    }
    public function deleteall(){
      $requests =  Requests::where('requested_by','=',auth('api')->user()->id)
            ->where('status','=',0)
            ->get();
        foreach($requests as $request){
          $request->delete();
        }
    }
    public function destroy($id){
      $request = Requests::findOrFail($id);
      if($request){
        $request->delete();
      }
    }



}
