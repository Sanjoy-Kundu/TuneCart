<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function UserRegistration(Request $request){
    try {
        $request->validate([
            'name' => 'required|string|max:1000',
            'email' => 'required|string|email|max:50|unique:users,email',
            'mobile' => 'required|string|max:50',
            'otp' => 'required',
            'password' => 'required|string|min:3'
        ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'otp' => $request->input('otp'),
            'mobile' => $request->input('mobile'),
            'password' => Hash::make($request->input('password'))
        ]);
        return response()->json(['status' => 'success', 'message' => 'User Registration Successfully']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
   }


 
}

