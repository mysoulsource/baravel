<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Demand;
use App\Demandstatus;
use App\Events\SendDemandResponseEvent;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $demands = Demand::with('bloodName')->get();

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
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'blood'=>'required|integer|max:191',
            'date'=>'required',
            'urgency'=>'required|integer|max:191',
            'detail'=>'required|string|max:500',
            'location'=>'required|string|max:500',
        ]);

        $demand_id = Demand::create([
            'title' => $request->input('title'),
            'blood' =>$request->input('blood'),
            'date' =>$request->input('date'),
            'urgency' =>$request->input('urgency'),
            'status' =>0,
            'detail' =>$request->input('detail'),
            'location' =>$request->input('location'),
            'added_by'=>auth('api')->user()->id,
            'code'=>str_random(16)
        ])->id;
        Demandstatus::create([
            'demand_id'=>$demand_id,
            'message'=>'Pending',
            'status'=>0
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $demand = Demand::findOrFail($id);
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'blood'=>'required|integer|max:191',
            'date'=>'required',
            'urgency'=>'required|integer|max:191',
            'detail'=>'required|string|max:500',
            'location'=>'required|string|max:500',
        ]);
        $demand->update([
            'title' => $request->input('title'),
            'blood' =>$request->input('blood'),
            'date' =>$request->input('date'),
            'urgency' =>$request->input('urgency'),
            'detail' =>$request->input('detail'),
            'location' =>$request->input('location'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demand = Demand::findOrFail($id);
        $demand->delete();
    }

    public function accept(Request $request){
        $demand = Demand::findOrFail($request->did);
        if($demand){

            $demand->update([
                'accepted_by' => auth('api')->user()->id,
                'status' => 1,
            ]);

            Demandstatus::create([
                'demand_id' => $demand->id,
                'status' => 1,
                'message'=>'accepted'
            ]);
            event(new SendDemandResponseEvent($demand));

        }
    }
}
