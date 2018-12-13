<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Demand;
use App\Demandstatus;
use App\Events\SendDemandResponseEvent;
use App\Notifications\DemandCreated;

class DemandController extends Controller
{
    /**
    methods used :
     *          index : to send all the demands data
     *          store : to create a new demands
     *          update: to update the demands
     *          delete : to delete the demands
     *          accept : if someone accpet the request call this function to notify the demand user and modify the status
     *
     * To do : Send only limited info to normal users
     *          Roles
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {

        $demands = Demand::with(['bloodName:id,name','user:id,name'])->paginate(10);
       return $demands;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating the request
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'blood'=>'required|integer|max:191',
            'date'=>'required',
            'urgency'=>'required|integer|max:191',
            'detail'=>'required|string|max:500',
            'location'=>'required|string|max:500',
        ]);

        //creating variable to create the demand to store it in demandstatus
        $demand= Demand::create([
            'title' => $request->input('title'),
            'blood' =>$request->input('blood'),
            'date' =>$request->input('date'),
            'urgency' =>$request->input('urgency'),
            'status' =>0,
            'detail' =>$request->input('detail'),
            'location' =>$request->input('location'),
            'added_by'=>auth('api')->user()->id,
            'code'=>str_random(16)
        ]);

        //storing the default info of demands
        Demandstatus::create([
            'demand_id'=>$demand->id,
            'message'=>'Pending',
            'status'=>0
        ]);
        $demand->notify(new DemandCreated);
    }



    public function update(Request $request, $id)
    {
        //finding the demand
        $demand = Demand::findOrFail($id);
        //validating the request
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'blood'=>'required|integer|max:191',
            'date'=>'required',
            'urgency'=>'required|integer|max:191',
            'detail'=>'required|string|max:500',
            'location'=>'required|string|max:500',
        ]);
        //updating the demand data
        $demand->update([
            'title' => $request->input('title'),
            'blood' =>$request->input('blood'),
            'date' =>$request->input('date'),
            'urgency' =>$request->input('urgency'),
            'detail' =>$request->input('detail'),
            'location' =>$request->input('location'),
        ]);
    }

    public function destroy($id)
    {
        //finding the demand data and deleting
        $demand = Demand::findOrFail($id);
        $demand->delete();
    }

    public function accept(Request $request)
    {
        //find the demand by id
        $demand = Demand::findOrFail($request->did);
        //if demand exists
        if($demand){
            //updaete the demand data with the accpeted user id and change status to 1
            $demand->update([
                'accepted_by' => auth('api')->user()->id,
                'status' => 1,
            ]);
            //modify the demandstatus table
            Demandstatus::create([
                'demand_id' => $demand->id,
                'status' => 1,
                'message'=>'accepted'
            ]);
            //fire the event to send mail and to pusher
            event(new SendDemandResponseEvent($demand));

        }
    }
}
