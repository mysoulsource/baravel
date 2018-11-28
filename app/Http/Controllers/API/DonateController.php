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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donate = Donate::with('requestedByName')
                ->where('requested_to','=',auth('api')->user()->id)
                ->where('status','=',0)
                ->get();
        return $donate;
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
        //
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

    }



    //function to accpet the donation request
    public function  accept(Request $request){
        $donate = Donate::findOrFail($request->did);
        if($donate){

            $donate->update([
                'status' => 1,
                'code'=>str_random(16),
                'message' => 'Accpeted'
            ]);

            Requeststatus::create([
                'request_id' => $donate->id,
                'status' => 1,
                'message'=>''
            ]);
            event(new SendResponseEvent($donate));

        }
    }
    public function  Decline(Request $request){
        $donate = Donate::findOrFail($request->did);
        if($donate){

            $donate->update([
                'status' => 2,
                'code'=>str_random(16)
            ]);
            Requeststatus::create([
                'request_id' => $donate->id,
                'status' => 0,
                'message'=>'Declined'
            ]);
            dispatch(new SendResponseMailJob($donate));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
