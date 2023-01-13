<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/logout", function () {
    Auth::logout();
    return redirect()->to("/");
})->name("logout");

Route::get("/login", function () {
    return view("auth.login");
    // Auth::loginUsingId(1);
    // return redirect()->to("/");
})->name("login");

Route::post("/login", function () {
    $credentials = request()->only("email", "password");
    if (Auth::attempt($credentials)) {
        return redirect()->to("/");
    } else {
        return redirect()->back()->with("error", __('invalid_credentials'));
    }
});

Route::get("/register", function () {
    return view("auth.register");
})->name("register");
Route::post("/register", [RegisterController::class, "register"]);


Route::group(['middleware' => 'auth'], function () {
    Route::get("/", [HomeController::class, "index"])->name("dashboard");
});
