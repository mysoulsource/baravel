<?php

namespace App\Http\Controllers;

use App\Demand;
use Illuminate\Http\Request;
use Auth;

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
        $user = Auth()->user();
        if($user->blood == null){
            return redirect()->route('user.Data');
        }else{
           return view('dashboard');
        }
        
    }



}
