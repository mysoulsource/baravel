<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:api');
    }

    public  function user(){
       $user = auth('api')->user();
       return $user;
    }
    public function index()
    {
        $users = User::all();
        return $users;
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
        //search for user
        $user = User::findOrFail($id);
        //validating the request
        $this->validate($request,[
            'name' =>'required|string|max:191',
            'email' =>'required|string|max:191|unique:users,email,'.$user->id,
            'blood'=>'required|string|max:191',
            'type'=>'required|string|max:191',
            'country'=>'required|string|max:191',
            'zone'=>'required|string|max:191',
            'district'=>'required|string|max:191',
            'area'=>'required|string|max:191',
        ]);

        //updating the user
        $user->update([
            'name' =>$request->input('name'),
            'email' =>$request->input('email'),
            'blood' =>$request->input('blood'),
            'type' =>$request->input('type'),
            'country' =>$request->input('country'),
            'zone' =>$request->input('zone'),
            'district' =>$request->input('district'),
            'area' =>$request->input('area'),
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return ['message','Deleted Successfully'];
    }
    public function search(){
        // if the gate allows

            //if the search query has data
            if($search = \Request::get('q')){
                /// store in users var after searching
                $users = User::where(function($query) use ($search){
                    $query->where('name','LIKE',"%$search%")
                        ->orWhere('email','LIKE',"%$search%")
                        ->orWhere('country','LIKE',"%$search%")
                        ->orWhere('zone','LIKE',"%$search%")
                        ->orWhere('district','LIKE',"%$search%")
                        ->orWhere('area','LIKE',"%$search%")
                        ->orWhere('blood','LIKE',"%$search%");
                })->get();
            }else{
                // if the query is empty send
                $users = User::latest()->get();
            }
            return $users;

    }
    public function advsearch(Request $request){
        $users = User::where(function($query) use ($request){
            $query->where('zone','LIKE',"%$request->zone%")
                ->Where('district','LIKE',"%$request->district%")
                ->Where('area','LIKE',"%$request->area%")
                ->Where('blood','LIKE',"%$request->bloodgroup%");
        })->get();
        return $users;
    }
}
