<?php

namespace App\Http\Controllers\Auth;

use App\Blood;
use App\Http\Controllers\Controller;
use App\userdetail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\User;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

  
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        
        Auth::login($authUser, true);
        return $this->checkUserData($authUser);
    }
    public function saveAvatar($path){
        $filename = date('mdYHis') . uniqid() . '.jpg';
        Image::make($path)->save(public_path('img/profile/'.$filename));
        return $filename;
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            return $authUser;
        }else{

            $path = $user->avatar;
            $image = $this->saveAvatar($path);
            $userId = User::updateOrCreate([
                'name'     => $user->name,
                'email'    => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id,
                'type'=>'Facebook',
                'img'=>$image,
                'email_verified_at'=> Carbon::now()->toDateTimeString()
            ]);
            userdetail::create([
               'user_id'=> $userId->id,
               'count'=> 0
            ]);
            return $userId;
        }

        
       
    }
    public function checkUserData($user){
        
        if($user->blood == null){
            $bloodgroups = Blood::all();
            return redirect()->route('user.Data')->with(compact('bloodgroups'))->with('verified',true);
        }else{
            return redirect($this->redirectTo)->with('verified', true);
        }
    }


}
