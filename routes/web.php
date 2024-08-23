<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Api Routes
|--------------------------------------------------------------------------
*/

Route::post("/user-registration", [UserController::class, "UserRegistration"]);
Route::post("/user-login", [UserController::class, "UserLogin"]);


//pages 
Route::get("/login", [UserController::class, "loginPage"])->name('login');
Route::get("/signup", [UserController::class, "singupPage"]);
Route::get("/forgot-password", [UserController::class, "forgotPasswordPage"]);




    //otp 
    Route::get("/verify-otp", [UserController::class, "otpPage"]);
    Route::post("/send-otp", [UserController::class, "SendOtpCode"]);
    Route::post("/verify-otp", [UserController::class, "VerifyOtp"]);

//login to dashboard



Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get("/dashboard/admin", [AdminController::class, "adminDashoard"])->name('dashboard.admin');
    });
    
    Route::middleware(['customer'])->group(function () {
        Route::get("/dashboard/customer", [CustomerController::class, "customerDashoard"])->name('dashboard.customer');
    });

    


    Route::get('/logout', [UserController::class, "logout"]);


 });
