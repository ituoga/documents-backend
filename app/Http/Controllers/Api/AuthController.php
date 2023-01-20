<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Api\Auth\StoreLoginRequest;
use App\Http\Requests\Api\Auth\StoreRegisterRequest;

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
        if (!$token = auth('api')->attempt(request()->only("email", "password"))) {
            return response()->json([
                'status' => 'error',
                'message' => __('invalid_credentials')
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => 'success',
            'message' => __('user_logged_in_successfully'),
            'user' => $user,
            'auth' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ]
        ], 200);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
