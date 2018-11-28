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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Requests::with('requestedToName')
            ->where('requested_by','=',auth('api')->user()->id)
            ->get();
       return $requests;
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
            'id' =>'required|integer|max:191',
            'date'=>'required|max:191',
            'urgency'=>'required|integer|max:191',
            'message'=>'required|max:500'
        ]);

        $request = Requests::create([
            'requested_by'=> auth('api')->user()->id,
            'requested_to'=>$request->input('id'),
            'status'=>0,
            'date'=>$request->input('date'),
            'urgency'=>$request->input('urgency'),
            'message'=>$request->input('message')
        ]);

        event(new SendRequestEvent($request));

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
        //
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
