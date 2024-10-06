<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallBack(){
        $user = Socialite::driver('google')->user();
        $finduser = User::where('google_id', $user->id)->first();
        if($finduser){
            Auth::login($finduser);
        }else{
            $newUser = User::updateOrCreate(
                ['email' => $user->email],[
                'name' => $user->name,
                'google_id' => $user->id,
                'password' => encrypt('abcd1234'),
            ]);
            Auth::login($newUser);
        }
        return redirect()->intended('home');
    }
}
