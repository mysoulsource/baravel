<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::all();
        return $notices;
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
        //
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
        $notice = Notice::findOrFail($id);
        $this->validate($request,[
            'title' =>'required|string|max:191',
            'status'=>'required|integer|max:191',
            'detail'=>'required|string|max:500',
        ]);
        $notice->update([
            'title' => $request->input('title'),
            'status' =>$request->input('status'),
            'detail' =>$request->input('detail'),
            'updated_by' =>  auth('api')->user()->id
        ]);
    }


    public function image(Request $request,$id){

        $notice = Notice::findOrFail($id);
        $old = $notice->image;
        $noticePhoto = public_path('img/notice/').$old;
        if($request->image){
            $name = time().'.' .explode('/', explode(':',substr($request->image,0,strpos($request->image,';')))[1])[1];
            $img = \Image::make($request->image);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path('img/notice/'.$name));
            $request->merge(['image'=>$name]);
        }
        $this->validate($request,[
            'image'=>'required',
        ]);
        $notice->update([
            'image' => $request->input('image')
        ]);
        if(file_exists($noticePhoto)){
            @unlink($noticePhoto);
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
        // $notice = Notice::findOrFail($id);
        // $noticePhoto =public_path('img/notice/').$notice->img;
        // if(file_exists($noticePhoto)){
        //     @unlink($noticePhoto);
        // }
        // $notice->delete();
        // return ['message','Deleted Successfully'];
    }
}
