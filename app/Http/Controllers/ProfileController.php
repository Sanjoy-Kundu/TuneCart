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
            $userInfoFormDB = User::where("id", "=", $id)->first();
            return $userInfoFormDB;
            //$oldPasswordFromInput = $request->input("old_password");
            //$oldPasswordFromInputHasg = Hash::make($oldPasswordFromInput);
            // echo $userInfoFormDB->password;
            // // echo "<br/>";
            // // echo $oldPasswordFromInputHasg;
            // if(Hash::check($oldPasswordFromInput, $userInfoFormDB->password) === $userInfoFormDB){
            //     echo "password milse";
            // }else{
            //     echo "mile nai";
            // }
           

        }catch(Exception $ex){
            return response()->json(["status" => "fail", "message" =>$ex->getMessage()]);
        }
    }
}
