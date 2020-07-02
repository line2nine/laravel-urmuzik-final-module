<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Role;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function showFormLogin()
    {
        return view('login.login');
    }

    function login(LoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = [
            'email' => $username,
            'password' => $password
        ];

        if (Auth::attempt($user)) {
            if (Auth::user()->role !== Role::ADMIN) {
                return redirect()->route('index');
            } else {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return back();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
