<?php

namespace App\Http\Controllers\Auth;

use App\GeneralSetting;
use App\User;
use App\Http\Controllers\Controller;
use App\UserLogin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(['guest']);
        $this->middleware('regStatus')->except('registrationNotAllowed');
    }

    public function showRegistrationForm()
    {
        $page_title = "Sign Up";

        return view(activeTheme() . 'user.auth.register', compact('page_title'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:60',
            'lastname' => 'required|string|max:60',
            'country' => 'string|max:80',
            'email' => 'required|string|email|max:160|unique:users',
            'mobile' => 'required|string|max:30|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|unique:users|min:4',
        ]);
    }

    public function register(Request $request)
    {

        $this->validator($request->all())->validate();


        if(isset($request->captcha)){
            if(!captchaVerify($request->captcha, $request->captcha_secret)){
                $notify[] = ['error',"Invalid Captcha"];
                return back()->withNotify($notify)->withInput();
            }
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function create(array $data)
    {

        $gnl = GeneralSetting::first();


        $user =  User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'mobile' => $data['mobile'],
            'address' => [
                'address' => '',
                'state' => '',
                'zip' => '',
                'country' => '',
                'city' => '',
            ],
            'status' => 1,
            'ev' =>  $gnl->ev ? 0 : 1,
            'ts' => 0,
            'tv' => 1,
        ]);



        $info = json_decode(json_encode(getIpInfo()), true);
        $ul['user_id'] = $user->id;
        $ul['user_ip'] =  request()->ip();
        $ul['longitude'] =  implode(',',$info['long']);
        $ul['latitude'] =  implode(',',$info['lat']);
        $ul['location'] =  implode(',',$info['city']) . (" - ". implode(',',$info['area']) ."- ") . implode(',',$info['country']) . (" - ". implode(',',$info['code']) . " ");
        $ul['country_code'] = implode(',',$info['code']);
        $ul['browser'] = $info['browser'];
        $ul['os'] = $info['os_platform'];
        $ul['country'] =  implode(',', $info['country']);
        UserLogin::create($ul);

        notify($user, 'WELCOME_MESSAGE', [
            'operating_system' => $info['os_platform'],
            'browser' => $info['browser'],
            'ip' => $info['ip'],
            'time' => $info['time'],
            'name' => $data['firstname'].' '.$data['lastname'],
            'email' => $data['email'],
            'username' => $data['username']
        ]);


        return $user;
    }

    public function registered()
    {
        return redirect()->route('user.home');
    }
}
