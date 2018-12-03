<?php

namespace App\Http\Controllers\API;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return $banner;
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

        if($request->img){
            $name = time().'.' .explode('/', explode(':',substr($request->img,0,strpos($request->img,';')))[1])[1];
            $img = \Image::make($request->img);
            $img->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/banners/'.$name));
            $request->merge(['img'=>$name]);
        }
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'status'=>'required|integer|max:191',
            'sub_title'=>'required|string|max:500',
            'img'=>'required|string|max:191',
        ]);
        Banner::create([
            'title' => $request->input('title'),
            'status' =>$request->input('status'),
            'sub_title' =>$request->input('sub_title'),
            'img' =>$request->input('img'),
            'uploaded_by' =>  auth('api')->user()->id
        ]);
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
        $banner = Banner::findOrFail($id);
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'status'=>'required|integer|max:191',
            'sub_title'=>'required|string|max:500',
        ]);
        if($request->img != $banner->img){
            $name = time().'.' .explode('/', explode(':',substr($request->img,0,strpos($request->img,';')))[1])[1];
            $img = \Image::make($request->img);
            $img->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/banners/'.$name));
            $request->merge(['img'=>$name]);
        }

        $banner->update([
            'title' => $request->input('title'),
            'status' =>$request->input('status'),
            'sub_title' =>$request->input('sub_title'),
            'img' =>$request->input('img'),
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
        $banner = Banner::findOrFail($id);
        $image = public_path('img/banners/').$banner->img;
        if(file_exists($image)){
            @unlink($image);
        }
        $banner->delete();
    }
}
