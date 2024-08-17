<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //user registration
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





   //user login
    public function UserLogin(Request $request){
        try{
            $request->validate([
                "email" => "required|string|max:100",
                "password" => "required|string|min:3"
            ]);
            
            $userCheck =  User::where("email",$request->input("email"))->first();

            //authentication check
            if(!$userCheck || !Hash::check($request->input("password"),$userCheck->password)){
                return response()->json(["status" => "fail", "message" => "Invalid User"]);
            }

            //token base login
            $token = $userCheck->createToken("authToken")->plainTextToken;
            return response()->json(["status" => "success", "message" => "User Login Successfully"]);
        }catch(Exception $e){
            return response()->json(["status" => "fail", "message" => $e->getMessage()]);
        }
    }


    //otp check
    public function sendOtpCode(Request $request){
        try{

            $request->validate([
                "email" => "required|string|max:100|"
            ]);
    
            $email = $request->input("email");
            $otp = rand(1000,9999);
            $count = User::where("email","=",$email)->count();
            if($count == 1){
                echo "email milse";
            }

        }catch(Exception $e){
            return response()->json(["status" => "fail", "message" => $e->getMessage()]);
        }
      
    }


}

