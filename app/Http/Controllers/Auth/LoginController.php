<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\User;
use Illuminate\Http\Request;

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

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            return $authUser;
        }
        return User::updateOrCreate([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'type'=>'Facebook'
        ]);     
        
       
    }
    public function checkUserData($user){
        
        if($user->blood == null){
            return redirect()->route('user.Data');
        }else{
            return "Hello";
        }
    }

    public function fillUserData(Request $request){
        dd($request);
        $user = Auth()->user();
        $this->validate($request,[
            'country'=>['required', 'string', 'max:255'],
            'zone'=>['required', 'string', 'max:255'],
            'district'=>['required', 'string', 'max:255'],
            'area'=>['required', 'string', 'max:255'],
            'age'=>['required', 'integer', 'max:255'],
            'blood'=>['required', 'string', 'max:255'],
        ]);
        $user->update([
            'country' => $request->input['country'],
            'zone' => $request->input['zone'],
            'district' => $request->input['district'],
            'area' => $request->input['area'],
            'blood' => $request->input['blood'],
            'age' => $request->input['age']
        ]);
    }
}
