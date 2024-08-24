<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
 
    public function porfileDetails(Request $request){
        try{
            $profileInfo = Auth::user();
            return response()->json(["status" => "success", "userInfo" =>$profileInfo]);
        }catch(Exception $e){
            return response()->json(["status" => "fail", "message" => $e->getMessage()]);
        }
            
    }


    public function profileDetailsUpdate(Request $request){

        $id = Auth::id();
        User::where("id", "=",$id)->update([
            "name" => $request->input("name"),
            "mobile" => $request->input("mobile")
        ]);
        // $inputEmail = $request->input('email');
        // $searchUserByEmail = User::where('email', '=',$inputEmail)->first();
        // if($searchUserByEmail){
        //     User::where('email', '=', $inputEmail)->update([
        //         "name" => $request->input('name'),
        //         "mobile" => $request->input('mobile')
        //     ]);
            return response()->json(["status" => "success", "message" => "Proffile Updated Successfully"]);
        
    }

    public function userPasswordReset(Request $request){
        try{

            $id = Auth::id();
            return $id;
            // $userInfoFormDB = User::where("id", "=", $id)->first();
            // if(!Hash::check($request->input('old_password'), $userInfoFormDB->password)){
            //     return response()->json(["status" => "fail", "message" => "Old Password doesn't match"]);
            // }
            // $newPassword = Hash::make($request->input('confirm_password'));

            // User::where("id", "=", $id)->update([
            //     "password" => $newPassword
            // ]);
            
            // return response()->json(["status" => "success", "message" => "Your Password Change Successfully"]);
        }catch(Exception $ex){
            return response()->json(["status" => "fail", "message" =>$ex->getMessage()]);
        }
    }






    public function userProfileUpload(Request $request){
        try{
            //$file = $request->hasFile('user_profile');
            if($request->hasFile('user_profile')){
                $file = $request->file("user_profile");
                $fileName = time()."-".$file->getClientOriginalName();
                $file->move_uploaded_file("/backend/uploads/profile/$fileName");
                return response()->json(["status" => "success", "message" => "Proffile Uploaded Successfully"]);
            }

        }catch(Exception $ex){
            return response()->json(["status" => "fail", "message" =>$ex->getMessage()]);
        }
    }
}
