<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\User\StoreLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function store(StoreLoginRequest $request)
    {
        $credentials = $request->only("email", "password");
        if (auth('web')->attempt($credentials)) {
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
