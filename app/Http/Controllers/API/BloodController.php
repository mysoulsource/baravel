<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blood;

class BloodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Blood::all();
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
            $img->save(public_path('img/bloods/'.$name));
            $request->merge(['image'=>$name]);
        }
        $this->validate($request,[
            'name' =>'required|string|max:191',
            'detail'=>'required|string|max:500',
            'image'=>'required',
        ]);

        Blood::create([
            'name' => $request->input('name'),
            'detail' =>$request->input('detail'),
            'image' =>$request->input('image'),
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
        $blood = Blood::findOrFail($id);
        $currentPhoto = $blood->image;
        if($request->image != $currentPhoto){
            $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
            $img = \Image::make($request->image);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/bloods/'.$name));
            $request->merge(['image'=>$name]);
            $oldImage = public_path('img/bloods'.$currentPhoto);
            if(file_exists($oldImage)){
                @unlink($oldImage);
            }
        }
        $this->validate($request,[
            'name' =>'required|string|max:191',
            'detail'=>'required|string|max:500',
        ]);

        $blood->update([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'image' => $request->input('image'),
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
        $blood = Blood::findOrFail($id);
        $bloodPhoto =public_path('img/bloods/').$blood->img;
        if(file_exists($bloodPhoto)){
            @unlink($bloodPhoto);
        }
        $blood->delete();
        return ['message','Deleted Successfully'];
    }
}
