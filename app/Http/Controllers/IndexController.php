<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Gallery;
use Illuminate\Http\Request;
use App\Demand;

class IndexController extends Controller
{

    public function home(){
        //demands
        $demands = Demand::with('bloodName')->latest()->paginate(4);
        //banners
        $banners = Banner::all();

        return view('index')->with(compact('demands','banners'));
    }
    public function gallery()
    {

        //gallery images
        $gallerys= Gallery::all();
        //demands
        $demands = Demand::with('bloodName')->latest()->paginate(4);
        return view('gallery')->with(compact('demands','gallerys'));
    }
    public function events()
    {
        return view('events');
    }
}
