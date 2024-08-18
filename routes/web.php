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

//pages 
Route::get("/login", [UserController::class, "loginPage"]);
Route::get("/signup", [UserController::class, "singupPage"]);
Route::get("/forgot-password", [UserController::class, "forgotPasswordPage"]);
Route::get("/user-otp", [UserController::class, "otpPage"]);
