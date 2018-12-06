<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\events as Events;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * methods :
     *          index: to view all the events
     *          store : to create a event
     *          update: to update the event
     *          destroy: to delete the event
     *          image: to update the image
     */
    public function index()
    {
        $events = Events::latest()->paginate(10);
        return $events;
    }


    public function store(Request $request)
    {
        //if request has image .generate name and make image and upload
        if($request->img){
            $name = time().'.' .explode('/', explode(':',substr($request->img,0,strpos($request->img,';')))[1])[1];
            $img = \Image::make($request->img);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/events/'.$name));
            $request->merge(['img'=>$name]);
        }
        //validate requests
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'organizer'=>'required|string|max:191',
            'detail'=>'required|string|max:500',
            'img'=>'required',
            'date'=>'required|max:191',
            'status'=>'required|max:191',
        ]);
        //create event
        Events::create([
            'title' => $request->input('title'),
            'organizer' =>$request->input('organizer'),
            'detail' =>$request->input('detail'),
            'img' =>$request->input('img'),
            'date' =>$request->input('date'),
            'status' =>$request->input('status'),
        ]);



    }

    public function update(Request $request, $id)
    {
        //find the event
        $event = Events::findOrFail($id);
        //validate the event
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'organizer'=>'required|string|max:191',
            'detail'=>'required|string|max:500',
            'date'=>'required|max:191',
            'status'=>'required|max:191',
        ]);
        //update the event
        $event->update([
            'title' => $request->input('title'),
            'organizer' =>$request->input('organizer'),
            'detail' =>$request->input('detail'),
            'date' =>$request->input('date'),
            'status' =>$request->input('status'),
        ]);
    }


    public function image(Request $request,$id){
        //find the event
        $event = Events::findOrFail($id);
        //to delete the old image
        $old = $event->img;
        $eventPhoto = public_path('img/events/').$old;
        //if request has image
        if($request->img){
            $name = time().'.' .explode('/', explode(':',substr($request->img,0,strpos($request->img,';')))[1])[1];
            $img = \Image::make($request->img);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/events/'.$name));
            $request->merge(['img'=>$name]);
        }
        //validate the request
        $this->validate($request,[
            'img'=>'required',
        ]);
        //update the image
        $event->update([
            'img' => $request->input('img')
        ]);


        //delete the old one
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
        //find the event
        $event = Events::findOrFail($id);
        //delete the image
        $eventPhoto =public_path('img/events/').$event->img;
        if(file_exists($eventPhoto)){
            @unlink($eventPhoto);
        }
        //delete the event
        $event->delete();
        return ['message','Deleted Successfully'];
    }
}
