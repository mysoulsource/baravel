<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.




     *todo : // close button reset the form data
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $categories;
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
        //validating the request
        $this->validate($request,[
            'name' =>'required|string|max:191',
            'image'=>'required',
        ]);

           if($request->image){
            $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
            $img = \Image::make($request->image);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/category/'.$name));
            $request->merge(['image'=>$name]);
        }
        Category::create([
            'name'=>$request->input('name'),
            'image'=>$request->input('image'),
            'user_id'=>auth('api')->user()->id
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
        $category = Category::findOrFail($id);
        $this->validate($request,[
            'name' =>'required|string|max:191',
        ]);
         if($request->image != $category->image){
            $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
            $img = \Image::make($request->image);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/category/'.$name));
            $request->merge(['image'=>$name]);
        }
        $category->update([
            'name'=>$request->input('name'),
            'image'=>$request->input('image'),
            'user_id'=>auth('api')->user()->id
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
         $category = Category::findOrFail($id);
        //find the image
        $image = public_path('img/category/').$category->image;
        //delete the image
        if(file_exists($image)){
            @unlink($image);
        }
        //delete the gallery
        $category->delete();
    }
}
