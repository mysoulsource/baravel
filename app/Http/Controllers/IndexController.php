<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Comment;
use App\Gallery;
use Illuminate\Http\Request;
use App\Demand;
use App\events;
use App\Category;
use App\Post;
use App\User;
use CyrildeWit\EloquentViewable\Support\Period;

class IndexController extends Controller
{
    //methods used
    //    home : redirecting to index page with data
    //    gallery : redirecting to gallery page with data
    //     events : redirecting to events page with data

    //to do
    // return demands only according to the logged in user blood group



    public function home(){
        //demands
        $demands = Demand::with('bloodName:id,image')->latest()->paginate(9);
       
        //events
        $events = events::latest()->paginate(9);
       
       
        

        return view('index')->with(compact('demands','events'));
    }
    public function about(){
        return view('about');
    }
    public function events(){
        $events = events::latest()->paginate(9);
        return view('events')->with(compact('events'));
    }

    public function singleEvent($id)
    {

        $event = events::findOrFail($id);
        return view('eventdetail')->with(compact('event'));
    }
    public function demands(){
        $demands = Demand::with('bloodName:id,image')->latest()->paginate(9);
        return view('demands')->with(compact('demands'));
    }
    public function blogs(){
        $categories = Category::latest()
                    ->paginate(3);
        $categories_list = Category::select('id','name')
                            ->withCount('posts')
                            ->paginate(7);            
        $posts = Post::with('user:id,name')
                ->withCount('comments')
                ->latest()
                ->paginate(5);
        $popular_posts = Post::select('id','image','title','created_at')
                        ->orderByViews('asc', Period::pastDays(3))
                        ->paginate(4);

        return view('blog')->with(compact('categories','posts','categories_list','popular_posts'));
    }
    public function gallery()
    {

        //gallery images
//        $gallerys= Gallery::all();
//        //demands
//        $demands = Demand::with('bloodName')->latest()->paginate(4);
        return view('gallery');
    }
    public function singleBlog($id){

        $categories = Category::select('id','name')->withCount('posts')->paginate(7);
        $post = Post::withCount('comments')->findOrFail($id);
        views($post)->record();
        $count = views($post)->count();
        $popular_posts = Post::select('id','image','title','created_at')->orderByViews('asc', Period::pastDays(3))->paginate(4);
        $comments = Comment::where('post_id','=',$id)->with('user:id,name,img')->get();
        return view('singleblog')->with(compact('post','categories','comments','count','popular_posts'));


    }
}
