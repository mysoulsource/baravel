<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    /**
     * methods used :
     *              Index: to send the notice
     *              update: to update the notice
     *              image: to update the image of notice
     *
     * NOTE: Only one notice is saved . So no delete and create function
     */
    public function index()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
            //sending the notice with relation of updated by
            $notices = Notice::with('Updatedby')->get();
            return $notices;
        }
    }





    public function update(Request $request, $id)
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
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
    }


    public function image(Request $request,$id)
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isAuthor')) {
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
    }

}
