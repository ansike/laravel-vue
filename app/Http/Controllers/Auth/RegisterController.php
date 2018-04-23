<?php

namespace App\Http\Controllers\Auth;

use Mail;
use Naux\Mail\SendCloudTemplate;

use App\User;
use App\Http\Controllers\Controller;
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        var_dump($data);
        $User = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'avatar'    => '/images/avatars/default.png',
            'comfirmation_token' => str_random(40),
        ]);
        $this -> sendVerifyEmailTo($User);
        return $User;
    }

    private function sendVerifyEmailTo($User){
        // 模板变量
        $bind_data = ['url' => route('email.verify',['token' => $User->comfirmation_token]),
                      'name' => $User->name
            ];
        $template = new SendCloudTemplate('test_template_active', $bind_data);

        Mail::raw($template, function ($message) use ($User) {
            $message->from('984315765@qq.com', 'ansike');
            $message->to($User->email);
        });
    }
}
