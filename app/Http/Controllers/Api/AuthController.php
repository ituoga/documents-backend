<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\StoreLoginRequest;
use App\Http\Requests\Api\Auth\StoreRegisterRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function create(StoreRegisterRequest $request)
    {
        try {
            $user = UserService::create($request);

            return response()->json([
                'status' => 'success',
                'message' => __('user_created_successfully'),
                'data' => $user
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function login(StoreLoginRequest $request)
    {
        if (!auth()->attempt(request()->only("email", "password"))) {
            return response()->json([
                'status' => 'error',
                'message' => __('invalid_credentials')
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => 'success',
            'message' => __('user_logged_in_successfully'),
            'data' => [
                'user' => $user,
                'token' => $user->createToken('auth_token')->plainTextToken
            ]
        ], 200);
    }
}
