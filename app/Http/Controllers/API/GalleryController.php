<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Gallery::all();
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
        if($request->image){
            $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
            $img = \Image::make($request->image);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/gallery/'.$name));
            $request->merge(['image'=>$name]);
        }
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'status'=>'required|integer|max:191',
            'source'=>'required|string|max:500',
            'image'=>'required|string|max:191',
        ]);
        Gallery::create([
            'title' => $request->input('title'),
            'status' =>$request->input('status'),
            'source' =>$request->input('source'),
            'image' =>$request->input('image'),
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
        $gallery = Gallery::findOrFail($id);
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'status'=>'required|integer|max:191',
            'source'=>'required|string|max:500',
        ]);
        if($request->image != $gallery->image){
            $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
            $img = \Image::make($request->image);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/gallery/'.$name));
            $request->merge(['image'=>$name]);
        }

        $gallery->update([
            'title' => $request->input('title'),
            'status' =>$request->input('status'),
            'source' =>$request->input('source'),
            'image' =>$request->input('image'),
            'updated_by' =>  auth('api')->user()->id
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
        $gallery = Gallery::findOrFail($id);
        $image = public_path('img/gallery/').$gallery->image;
        if(file_exists($image)){
            @unlink($image);
        }
        $gallery->delete();
    }
}
