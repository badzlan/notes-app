<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);
        return redirect()->intended('/');
    }

    protected function _registerOrLoginUser($data){
        $user = User::where('email', '=', $data->email)->first();
        if(!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->google_id = $data->id;
            $user->save();
        }

        Auth::login($user);
    }
}
