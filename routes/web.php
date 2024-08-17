<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Api Routes
|--------------------------------------------------------------------------
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post("/user-registration", [UserController::class, "UserRegistration"]);
Route::post("/user-login", [UserController::class, "UserLogin"]);
Route::post("/send-otp", [UserController::class, "sendOtpCode"]);
Route::post("/verify-otp", [UserController::class, "verifyOtp"]);
