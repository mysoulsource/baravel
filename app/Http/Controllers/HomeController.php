<?php

namespace App\Http\Controllers;

use App\Blood;
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
    public function userData(){
        $user = Auth()->user();
        if($user->blood != null){
            return redirect()->route('user.profile');
        }else{
            $bloodgroups = Blood::all();
            return view('auth.userData')->with(compact('bloodgroups'));
        }
    }
    public function fillUserData(Request $request){
        $user = Auth()->user();
        $this->validate($request,[
            'country'=>['required', 'string', 'max:255'],
            'zone'=>['required', 'string', 'max:255'],
            'district'=>['required', 'string', 'max:255'],
            'area'=>['required', 'string', 'max:255'],
            'age'=>['required', 'integer', 'max:255'],
            'blood'=>['required', 'string', 'max:255'],
        ]);
        $user->update([
            'country' => $request->input('country'),
            'zone' => $request->input('zone'),
            'district' => $request->input('district'),
            'area' => $request->input('area'),
            'blood' => $request->input('blood'),
            'age' => $request->input('age'),
            'type'=>'user'
        ]);

        return redirect()->route('dashboard');
    }



}
