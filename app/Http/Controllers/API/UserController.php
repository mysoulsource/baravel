<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Demand;
use App\userdetail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * methods used :
     *              user: for pusher functionality, alert only the requested one
     *              index: return all the users
     *              profile: return authenticated user profile data
     *              updateProfile : UPDATE THE profile
     *              update : done by admin
     *              destroy : To filter spam user in future
     *              search : fast search function of users
     *              advsearch : advance search of a user according to location and blood group
     */
    public function __construct(){
        //laravel passport api protection against unauthenticated users
        $this->middleware('auth:api');
    }

    public  function user(){
       $user = auth('api')->user();
       return $user;
    }
    public function index()
    {
        if (\Gate::allows('isAdmin') ) {
            $users= 
                     User::with('bloodgroup:id,name')
                    ->latest()
                    ->paginate(10);
        }
        else if(\Gate::allows('isUser') || \Gate::allows('isAuthor')){
            $users = 
                      User::with('bloodgroup:id,name')
                    ->select('id','name','country','zone','district','area','blood')
                    ->paginate(10);
        }
       
        return $users;
    }

    public function profile(Request $request)
    {
        return auth('api')->user();
    }

    public function updateProfile(Request $request){

        ///for api authenticated users
        $user = auth('api')->user();
        //if user didnot uploaded a new image
        if($request->img != $user->img){
            //code to change base64 code image name to timestamp name
            $name = time().'.' .explode('/',explode(':',substr($request->img,0,strpos($request->img,';')))[1])[1];
            //use image intervention to convert base64 image to proper image and save it to folder
            \Image::make($request->img)->save(public_path('img/profile/').$name);
            //update the value in request photo
            $request->merge(['img'=>$name]);
            //get the current photo with full dir
            $userPhoto = public_path('img/profile/').$user->photo;
            //check if the file exists
            if(file_exists($userPhoto)){
                //delete the file
                @unlink($userPhoto);
            }

        }

        $this->validate($request,[
            'name' =>'required|string|max:191',
            'email' =>'required|string|max:191|unique:users,email,'.$user->id,
            'password' =>'sometimes|string|max:191|min:6',
        ]);
        dd($request);
        //if the password is not empty
        if(!empty($request->password)){
            //change it to hashed password
            $request->merge(['password'=>
                Hash::make($request->password)
            ]);
        }
        $user->update($request->all());
        return ['message','Successfully Updated'];
    }

    public function update(Request $request, $id)
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
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

    }


    public function destroy($id)
    {
        if (\Gate::allows('isAdmin')) {
            $user = User::findOrFail($id);
            $user->delete();
        }
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
    
    public function code(request $request){
        $id = auth('api')->user()->id;
        $demand = Demand::where(function($query) use($id,$request){
                   $query->where('accepted_by','=',$id)
                         ->where('code','=',$request->code);   
        })->first();
       if($demand){
            $user = userdetail::where('user_id','=',$id)->increment('count');
            $demand->delete();
            return true;
       }else{
        return false;
       }
    }

    public function getInfo(){
        $user = auth('api')->user();
        $data = [
            'activeStatus' => $user->status,
            'infoStatus'=>$user->info_status
        ];
        return $data;
    }
    public function changeStatus(){
         $user = auth('api')->user();
        if($user->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
         $user->update([
            'status' => $status 
         ]);
         
    }
      public function changeInfoStatus(){
         $user = auth('api')->user();
        if($user->info_status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
         $user->update([
            'info_status' => $status 
         ]);
    }
}
