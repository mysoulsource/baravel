<?php

namespace App\Http\Controllers\API;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
        methods used :
     *          index : to send all the banner data
     *          store : to create a new banner
     *          update: to update the banner
     *          delete : to delete the banner
     *
     * To do : Send only limited info to normal users
     *         Roles
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            $banner = Banner::all();
            return $banner;
        }
    }




    public function store(Request $request)
    {


        //converting the base64 image to unique name and with intercention to make Image
        //store it in img/banners folder
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            if($request->img){
                $name = time().'.' .explode('/', explode(':',substr($request->img,0,strpos($request->img,';')))[1])[1];
                $img = \Image::make($request->img);
                $img->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path('img/banners/'.$name));
                $request->merge(['img'=>$name]);
            }
            //validating the request
            $this->validate($request,[
                'title' =>'required|string|max:191',
                'status'=>'required|integer|max:191',
                'sub_title'=>'required|string|max:500',
                'img'=>'required|string|max:191',
            ]);

            //creating the banner
            Banner::create([
                'title' => $request->input('title'),
                'status' =>$request->input('status'),
                'sub_title' =>$request->input('sub_title'),
                'img' =>$request->input('img'),
                'uploaded_by' =>  auth('api')->user()->id
            ]);
        }
    }




    public function update(Request $request, $id)
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            //finding the banner through id
            $banner = Banner::findOrFail($id);
            //validating the request
            $this->validate($request,[
                'title' =>'required|string|max:191',
                'status'=>'required|integer|max:191',
                'sub_title'=>'required|string|max:500',
            ]);

            //converting image
            if($request->img != $banner->img){
                $name = time().'.' .explode('/', explode(':',substr($request->img,0,strpos($request->img,';')))[1])[1];
                $img = \Image::make($request->img);
                $img->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path('img/banners/'.$name));
                $request->merge(['img'=>$name]);
            }
            //updating the banner
            $banner->update([
                'title' => $request->input('title'),
                'status' =>$request->input('status'),
                'sub_title' =>$request->input('sub_title'),
                'img' =>$request->input('img'),
            ]);
        }
    }

    public function destroy($id)
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            //finding the banner through id
            $banner = Banner::findOrFail($id);
            //searching for old image
            $image = public_path('img/banners/').$banner->img;
            //if file exists deleting it
            if(file_exists($image)){
                @unlink($image);
            }
            //finally deleting the banner
            $banner->delete();
        }
    }
}
