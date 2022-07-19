<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $username = $request->input('txtUsername');
        $password = $request->input('txtPassword');
        if (Auth::attempt(['txtusername' => $username, 'password' => $password])) {
            return redirect()->route('dashboard');
        }else {
            return Redirect()->back()->with('failed','Your Email or Password are incorrect!');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
