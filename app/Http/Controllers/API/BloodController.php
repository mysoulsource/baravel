<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blood;

class BloodController extends Controller
{
    /**
    methods used :
     *          index : to send all the blood data
     *          store : to create a new bloodgroup
     *          update: to update the bloodgroup
     *          delete : to delete the bloodgroup
     *
     * To do : Send only limited info to normal users
     *          Roles
     */
    public function index()
    {
        return Blood::all();
        //returning all the bloodgroup data back to vue
    }


    public function store(Request $request)
    {
        //converting the image
        if($request->image){
            $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
            $img = \Image::make($request->image);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/bloods/'.$name));
            $request->merge(['image'=>$name]);
        }
        //validating the request
        $this->validate($request,[
            'name' =>'required|string|max:191',
            'detail'=>'required|string|max:500',
            'image'=>'required',
        ]);

        //creating the bloodgroup data
        Blood::create([
            'name' => $request->input('name'),
            'detail' =>$request->input('detail'),
            'image' =>$request->input('image'),
        ]);
    }



    public function update(Request $request, $id)
    {
        //finding the blood group by id
        $blood = Blood::findOrFail($id);
        //checking if the image is same
        $currentPhoto = $blood->image;
        //if not upload image
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
        //validating the request
        $this->validate($request,[
            'name' =>'required|string|max:191',
            'detail'=>'required|string|max:500',
        ]);
        //updating the data
        $blood->update([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'image' => $request->input('image'),
        ]);
    }

    public function destroy($id)
    {
        //finding by id
        $blood = Blood::findOrFail($id);
        //check old image
        $bloodPhoto =public_path('img/bloods/').$blood->img;
        //if image found delete it
        if(file_exists($bloodPhoto)){
            @unlink($bloodPhoto);
        }
        //finally delete the data
        $blood->delete();
        return ['message','Deleted Successfully'];
    }
}
