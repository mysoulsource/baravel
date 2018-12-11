<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Gallery;
use Illuminate\Http\Request;
use App\Demand;

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
        $demands = Demand::with('bloodName')->latest()->paginate(4);
        //banners
        $banners = Banner::all();

        return view('index')->with(compact('demands','banners'));
    }
    public function about(){
        return view('about');
    }
    public function events(){
        return view('events');
    }
    public function demands(){
        return view('demands');
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
