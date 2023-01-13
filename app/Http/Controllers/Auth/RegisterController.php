<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\User\StoreRegisterRequest;

class RegisterController extends Controller
{
    public function store(StoreRegisterRequest $request)
    {
        $user = UserService::create($request);
        Auth::login($user);
        if (auth()->check()) {
            return redirect()->to("/");
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
