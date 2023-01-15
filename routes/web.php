<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DownloadMediaController;

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

Route::get("/login", [LoginController::class, "showLoginForm"])->name("login");
Route::post("/login", [LoginController::class, "store"])->name("login");
Route::get("/logout", [LoginController::class, "logout"])->name("logout");
Route::get("/register", [RegisterController::class, "showRegistrationForm"])->name("register");
Route::post("/register", [RegisterController::class, "store"])->name("register");


Route::group(['middleware' => 'auth'], function () {
    Route::get("/", [HomeController::class, "index"])->name("dashboard");
    Route::resource("files", FilesController::class);
    Route::resource("users", UsersController::class);
    Route::get("/download/{id}", [DownloadMediaController::class, "download"])->name("download");
});
