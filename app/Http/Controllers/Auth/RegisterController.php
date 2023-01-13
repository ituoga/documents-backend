<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;


    public function store(StoreRegisterRequest $request)
    {
        return UserService::create($request);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
