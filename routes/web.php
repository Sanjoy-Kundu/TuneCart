<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Api Routes
|--------------------------------------------------------------------------
*/

Route::post("/user-registration", [UserController::class, "UserRegistration"]);
Route::post("/user-login", [UserController::class, "UserLogin"]);
Route::post("/send-otp", [UserController::class, "SendOtpCode"]);
Route::post("/verify-otp", [UserController::class, "VerifyOtp"]);
