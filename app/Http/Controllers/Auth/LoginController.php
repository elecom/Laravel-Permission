<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SocialProfile;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider($provider){
        
        $providers = ['facebook', 'google'];
        
        if(in_array($provider,$providers)){
            return Socialite::driver($provider)->redirect();
        }
        else{
            return redirect()->route('login')->with('info', $provider . __('adminlte::adminlte.login_social_error_provider'));
        }
        
    }

    public function handleProviderCallback(Request $request, $provider){
        
        if($request->get('error')){
            return redirect()->route('login');
        }
        
        $userSocial = Socialite::driver($provider)->user();

        
        $social_profile = SocialProfile::where('social_id', $userSocial->getId())
                                        ->where('social_name', $provider)
                                        ->first();
        
        if(!$social_profile){
            
            $user = User::where('email', $userSocial->getEmail())->first();
            
            if($user && $user->password !== NULL){
                return redirect()->route('login')->with('info', __('adminlte::adminlte.login_social_user_exist', ['name' => $userSocial->getEmail()]));
            }

            if(!$user){
                $user = User::create([
                    'name' => $userSocial->getName(),
                    'email' => $userSocial->getEmail()
                ]);
            }

            $social_profile = SocialProfile::create([
                'user_id'       => $user->id,
                'social_id'     => $userSocial->getId(),
                'social_name'   => $provider,
                'social_avatar' => $userSocial->getAvatar()
            ]);
        }

        auth()->login($social_profile->user);

        return redirect()->route('home');

    }
}
