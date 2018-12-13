<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            $posts = Post::with('category')->with('user')->get();
            return $posts;
         }
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
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
                if($request->image){
                    $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
                    $img = \Image::make($request->image);
                    $img->resize(600, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save(public_path('img/posts/'.$name));
                    $request->merge(['image'=>$name]);
                }
                $this->validate($request,[
                    'title' =>'required|string|max:191',
                    'category_id'=>'required|integer',
                    'tags'=>'required|string|max:191',
                    'slug'=>'required|string|max:191',
                    'image'=>'required',
                    'content'=>'required'
                ]);
                Post::create([
                   'title'=>$request->input('title'),
                   'category_id'=>$request->input('category_id'),
                   'tags'=>$request->input('tags'),
                   'slug'=>$request->input('slug'),
                   'image'=>$request->input('image'),
                   'content'=>$request->input('content'),
                    'user_id'=>auth('api')->user()->id
                ]);
            }

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
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            $post = Post::findOrFail($id);
             $this->validate($request,[
                'title' =>'required|string|max:191',
                'category_id'=>'required|integer',
                'tags'=>'required|string|max:191',
                'slug'=>'required|string|max:191'
            ]);

             $post->update([
                'title'=>$request->input('title'),
                'category_id'=>$request->input('category_id'),
                'tags'=>$request->input('tags'),
                'slug'=>$request->input('slug'),
                'published_on'=>$request->input('published_on   ')
             ]);
         }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            $post = Post::findOrFail($id);
            $image = public_path('img/posts/').$post->image;
            //delete the image
            if(file_exists($image) && $post->image != 'post.jpg'){
                @unlink($image);
            }
            //delete the gallery
            $post->delete();
        }
    }

   
    public function image(Request $request,$id)
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
        //find the post
            $post = Post::findOrFail($id);
            //to delete the old image
            $old = $post->image;
            $postPhoto = public_path('img/posts/').$old;
            //if request has image
            if($request->image){
                $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
                $img = \Image::make($request->image);
                $img->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path('img/posts/'.$name));
                $request->merge(['image'=>$name]);
            }
            //validate the request
            $this->validate($request,[
                'image'=>'required',
            ]);
            //update the image
            $post->update([
                'image' => $request->input('image')
            ]);


            //delete the old one prevent the default image 
            if(file_exists($postPhoto) && $old != 'post.jpg'){
                @unlink($postPhoto);
            }
        }


    }
    public function category(){
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            $categories = Category::all('id','name');
            return $categories;
        }
    }
    public function content(Request $request,$id){
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            $post = Post::findOrFail($id);
            //validate the request
            $this->validate($request,[
                'content'=>'required',
            ]);
            $post->update([
               'content' => $request->input('content')
            ]);
        }
    }

}
