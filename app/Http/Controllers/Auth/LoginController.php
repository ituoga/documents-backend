<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function store()
    {
        $credentials = request()->only("email", "password");
        if (Auth::attempt($credentials)) {
            return redirect()->to("/");
        } else {
            return redirect()->back()->with("error", __('invalid_credentials'));
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to("/");
    }
}
