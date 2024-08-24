<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //user registration

    public function singupPage(){
        return view("pages.auth.signupPage");
    }


   public function UserRegistration(Request $request){
    try {
        // $request->validate([
        //     'name' => 'required|string|max:100',
        //     'email' => 'required|string|email|max:100|unique:users,email',
        //     'mobile' => 'required|string|max:20',
        //     'otp' => 'required',
        //     'password' => 'required|string|min:3'
        // ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => Hash::make($request->input('password'))
        ]);
        return response()->json(['status' => 'success', 'message' => 'User Registration Successfully']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
   }





   //user login

   public function loginPage(){
    return view('pages.auth.loginPage');
   }
    public function UserLogin(Request $request){
        try{
            // $request->validate([
            //     "email" => "required|string|max:100",
            //     "password" => "required|string|min:3"
            // ]);


         
            
            $userCheck =  User::where("email",$request->input("email"))->first();

            //authentication check
            if(!$userCheck || !Hash::check($request->input("password"),$userCheck->password)){
                return response()->json(["status" => "fail", "message" => "Invalid User"]);
            }
         
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            //token base login
            $token = $userCheck->createToken("authToken")->plainTextToken;
            return response()->json(["status" => "success", "message" => "User Login Successfully", "token" => $token, "userInfo" => $userCheck]);
            }
           
        }catch(Exception $e){
            return response()->json(["status" => "fail", "message" => $e->getMessage()]);
        }
    }






    //otp check forgt password
    public function forgotPasswordPage(){
        return view("pages.auth.forgotPasswordPage");
    }

    public function SendOtpCode(Request $request){
        try{


            
            $request->validate([
                "email" => "required|string|max:100|"
            ]);
    
            $email = $request->input("email");
            $otp = rand(1000,9999);
            $count = User::where("email","=",$email)->count();
            if($count == 1){
                //echo "get email";
                Mail::to($email)->send(new OtpMail($otp)); //form laravel documentation
                User::where("email", "=",$email)->update(["otp" => $otp]); //update otp
                return response()->json(["status" => "success", "message" => "Your 4 digits opt has been send successfully."]);
            }
            else{
                return response()->json(["status" => "fail", "message" => "Invalid Email"]);
            }

        }catch(Exception $e){
            return response()->json(["status" => "fail", "message" => $e->getMessage()]);
        }
    }



    //verify otp

    public function otpPage(){
        return view("pages.auth.otpPage");
    }

    public function VerifyOtp(Request $request){
        try{
            $request->validate([
                "email" => "required|string|max:100",
                "otp"   => "required|string|min:4"
            ]);

            $email = $request->input("email");
            $otp   = $request->input("otp");

            $userCheck = User::where("email","=",$email)->where("otp","=",$otp)->first();

            if(!$userCheck){
                return response()->json(["status" => "fail", "message" => "Invalid Otp."]);
            }

            //otp update
            User::where("email","=",$email)->update(["otp" => "0"]);
            $token = $userCheck->createToken("authToken")->plainTextToken;
            return response()->json(["status" => "success", "message" => "Otp Verification Successfully", "token" => $token]);            
        }catch(Exception $e){
            return response()->json(["status" => "fail", "message" => $e->getMessage()]);
        }
    }


    //logout
    public function logout(){
        Auth::logout();
        return redirect("/login");
    }

}

