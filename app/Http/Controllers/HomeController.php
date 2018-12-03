<?php

namespace App\Http\Controllers;

use App\Demand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home')->with(compact('demands'));
    }
    public function home(){
        $demands = Demand::with('bloodName')->latest()->paginate(4);
        return view('index')->with(compact('demands'));
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function events()
    {
        return view('events');
    }
}
