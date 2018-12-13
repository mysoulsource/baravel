<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * methods :
     *          index: to view all the gallery
     *          store : to create a gallery
     *          update: to update the gallery
     *          destroy: to delete the gallery
     */
    public function index()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
                 return Gallery::all();
        }
    }


    public function store(Request $request)
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
        //if request has image
                if($request->image){
                    $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
                    $img = \Image::make($request->image);
                    $img->resize(600, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save(public_path('img/gallery/'.$name));
                    $request->merge(['image'=>$name]);
                }
                //validate the request
                $this->validate($request,[
                    'title' =>'required|string|max:191',
                    'status'=>'required|integer|max:191',
                    'source'=>'required|string|max:500',
                    'image'=>'required|string|max:191',
                ]);
                //create the gallery
                Gallery::create([
                    'title' => $request->input('title'),
                    'status' =>$request->input('status'),
                    'source' =>$request->input('source'),
                    'image' =>$request->input('image'),
                    'uploaded_by' =>  auth('api')->user()->id
                ]);
            }
    }

    public function update(Request $request, $id)
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
        //find the gallery data
                $gallery = Gallery::findOrFail($id);
                $this->validate($request,[
                    'title' =>'required|string|max:191',
                    'status'=>'required|integer|max:191',
                    'source'=>'required|string|max:500',
                ]);
                //if request image is not old one
                if($request->image != $gallery->image){
                    $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
                    $img = \Image::make($request->image);
                    $img->resize(600, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save(public_path('img/gallery/'.$name));
                    $request->merge(['image'=>$name]);
                }
                //update the gallery
                $gallery->update([
                    'title' => $request->input('title'),
                    'status' =>$request->input('status'),
                    'source' =>$request->input('source'),
                    'image' =>$request->input('image'),
                    'updated_by' =>  auth('api')->user()->id
                ]);
            }
    }

    public function destroy($id)
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            //find the data
            $gallery = Gallery::findOrFail($id);
            //find the image
            $image = public_path('img/gallery/').$gallery->image;
            //delete the image
            if(file_exists($image)){
                @unlink($image);
            }
            //delete the gallery
            $gallery->delete();
        }
    }
}
