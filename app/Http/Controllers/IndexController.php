<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Gallery;
use Illuminate\Http\Request;
use App\Demand;
use App\events;

class IndexController extends Controller
{
    //methods used
    //    home : redirecting to index page with data
    //    gallery : redirecting to gallery page with data
    //     events : redirecting to events page with data

    //to do
    // return demands only according to the logged in user blood group



    public function home(){
        //demands
        $demands = Demand::with('bloodName:id,image')->latest()->paginate(9);
       
        //events
        $events = events::latest()->paginate(9);
       
       
        

        return view('index')->with(compact('demands','events'));
    }
    public function about(){
        return view('about');
    }
    public function events(){
        $events = events::latest()->paginate(9);
        return view('events')->with(compact('events'));
    }

    public function singleEvent($id)
    {
        $event = events::findOrFail($id);
        return view('eventdetail')->with(compact('event'));
    }
    public function demands(){
        $demands = Demand::with('bloodName:id,image')->latest()->paginate(9);
        return view('demands')->with(compact('demands'));
    }
    public function blogs(){
        return view('blog');
    }
    public function gallery()
    {

        //gallery images
//        $gallerys= Gallery::all();
//        //demands
//        $demands = Demand::with('bloodName')->latest()->paginate(4);
        return view('gallery');
    }
//    public function events()
//    {
//          $banners = Banner::all();
//          $demands = Demand::with('bloodName')->latest()->paginate(4);
//        return view('events')->with(compact('demands','banners'));
//    }
}
