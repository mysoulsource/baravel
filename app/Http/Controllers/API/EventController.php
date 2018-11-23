<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\events as Events;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::latest()->paginate(10);
        return $events;
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
        if($request->img){
            $name = time().'.' .explode('/', explode(':',substr($request->img,0,strpos($request->img,';')))[1])[1];
            $img = \Image::make($request->img);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/events/'.$name));
            $request->merge(['img'=>$name]);
        }
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'organizer'=>'required|string|max:191',
            'detail'=>'required|string|max:500',
            'img'=>'required',
            'date'=>'required|max:191',
            'status'=>'required|max:191',
        ]);

        Events::create([
            'title' => $request->input('title'),
            'organizer' =>$request->input('organizer'),
            'detail' =>$request->input('detail'),
            'img' =>$request->input('img'),
            'date' =>$request->input('date'),
            'status' =>$request->input('status'),
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
        $event = Events::findOrFail($id);
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'organizer'=>'required|string|max:191',
            'detail'=>'required|string|max:500',
            'date'=>'required|max:191',
            'status'=>'required|max:191',
        ]);
        $event->update([
            'title' => $request->input('title'),
            'organizer' =>$request->input('organizer'),
            'detail' =>$request->input('detail'),
            'date' =>$request->input('date'),
            'status' =>$request->input('status'),
        ]);
    }


    public function image(Request $request,$id){
        $event = Events::findOrFail($id);
        $old = $event->img;
        $eventPhoto = public_path('img/events/').$old;
        if($request->img){
            $name = time().'.' .explode('/', explode(':',substr($request->img,0,strpos($request->img,';')))[1])[1];
            $img = \Image::make($request->img);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/events/'.$name));
            $request->merge(['img'=>$name]);
        }
        $this->validate($request,[
            'img'=>'required',
        ]);
        $event->update([
            'img' => $request->input('img')
        ]);
        if(file_exists($eventPhoto)){
            @unlink($eventPhoto);
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
        $event = Events::findOrFail($id);
        $eventPhoto =public_path('img/events/').$event->img;
        if(file_exists($eventPhoto)){
            @unlink($eventPhoto);
        }
        $event->delete();
        return ['message','Deleted Successfully'];
    }
}
