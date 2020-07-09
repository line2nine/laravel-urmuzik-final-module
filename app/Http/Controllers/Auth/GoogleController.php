<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Role;
use App\Http\Controllers\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $findUser = User::where('google_id', $user->id)->first();

        if ($findUser) {
            Auth::login($findUser);
            notify("Welcome " . Auth::user()->name . "!", 'success');
            return redirect()->route('index');

        } else {
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->avatar = $user->avatar;
            $newUser->google_id = $user->id;
            $newUser->password = Hash::make('123456789@');
            $newUser->role = Role::USER;
//            $newUser->active = true;
            $newUser->status = Status::ACTIVE;
            $newUser->save();

            Auth::login($newUser);
            notify("Welcome " . Auth::user()->name . "!", 'success');
            return redirect()->route('index');
        }
    }
}
