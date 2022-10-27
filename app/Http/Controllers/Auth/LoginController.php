<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Events\LoginEvent;
use Illuminate\Http\Request;
//use Socialite;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite as Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::ACCOUNT;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        event(new LoginEvent($user));
    }

    public function loginVK()
    {
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK()
    {
        $vkuser = Socialite::driver('vkontakte')->user();
        $user = User::where('id_in_soc', $vkuser->id)
            ->where('type_auth', 'vk')
            ->first();
        if ($user) {
            $user->update([
                'avatar' => $vkuser->avatar,
            ]);
        } else {

            foreach ($vkuser as $key => $value) {
                $vkuser_arr[$key] = $value;
            }
            //   $vkuser_arr['email']='1';
            //    $vkuser_arr['name']=null;
            $validator = Validator::make($vkuser_arr, [
                'name' => ['required', 'string','min:2', 'max:100'],
                'id' => ['required', 'max:50', 'unique:users,id_in_soc'],
                'avatar' => ['nullable', 'max:500'],
                'email' =>  ['required', 'email:rfc,dns', 'unique:users,email'],
            ]);

            /* dump($vkuser_arr);
            dump($validator->fails());
            dd($validator); */

            if (!$validator->fails()) {
                $user = User::create([
                    'name' => $vkuser_arr['name'],
                    'email' => $vkuser_arr['email'],
                    'password' =>  Hash::make($vkuser_arr['id']),
                    'id_in_soc' => $vkuser_arr['id'],
                    'type_auth' => 'vk',
                    'is_admin' => false,
                    'avatar' => $vkuser_arr['avatar'],
                ]);
            } else {
                return view('404');
            }
        }
        Auth::login($user);
        event(new LoginEvent($user));
        return redirect()->route('home');
    }


    public function loginYA()
    {
        return Socialite::with('yandex')->redirect();
    }


    public function responseYA()
    {
        $yauser = Socialite::driver('yandex')->user();
        $user = User::where('id_in_soc', $yauser->id)
            ->where('type_auth', 'ya')
            ->first();
        if ($user) {
            $user->update([
                'avatar' => $yauser->avatar,
            ]);
            event(new LoginEvent($user));
        } else {

            foreach ($yauser as $key => $value) {
                $yauser_arr[$key] = $value;
            }
            //  $yauser_arr['email']='1';
            //    $yauser_arr['name']=null;
            $validator = Validator::make($yauser_arr, [
                'name' => ['required', 'string', 'min:2', 'max:100'],
                'id' => ['required',  'max:100', 'unique:users,id_in_soc'],
                'avatar' => ['nullable', 'max:500'],
                'email' =>  ['required', 'email:rfc,dns', 'unique:users,email'],
            ]);

            if (!$validator->fails()) {
                $user = User::create([
                    'name' => $yauser_arr['name'],
                    'email' => $yauser_arr['email'],
                    'password' =>  Hash::make($yauser_arr['id']),
                    'id_in_soc' => $yauser_arr['id'],
                    'type_auth' => 'ya',
                    'is_admin' => false,
                    'avatar' => $yauser_arr['avatar'],
                ]);
            } else {
                return view('404');
            }
        }
        Auth::login($user);
        event(new LoginEvent($user));
        return redirect()->route('home');
    }
}
