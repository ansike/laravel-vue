<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function verify($token){
        $user = User::where('comfirmation_token',$token)->first();
        if(is_null($user)){
            return redirect('/');
        }
        $user->is_active = 1;
        $user->comfirmation_token = str_random(40);
        $user->save();

        Auth::login($user);

        return redirect('/home');

    }
}
