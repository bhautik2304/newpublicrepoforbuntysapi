<?php

namespace App\Http\Controllers;

use App\Mail\testmail;
use App\Jobs\passwordRestMailjob;
use App\Models\{user,store};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash,Mail};

class authcontroller extends Controller
{

    public function login(Request $req)
    {
        # code...

        $user = user::where('email', $req->email)->orWhere('mobaile',$req->email)->first();
        if (!$user) {
            # User Not Found
            return response(["msg"=>"Users Not Find. Wrong Credentials","code"=>404],200);
        }
        if (!Hash::check($req->password,$user->password)) {
            # code...
            return response(["msg"=>"Wrong Password ".$user->name,"code"=>404],200);
        }
        $token= $user->startSession($user);

        return response(["msg"=>"User Find Out ","user"=>$user,"tocken"=>$token[0],"sessionid"=>$token[1],"code"=>200],200);


    }

    public function logout(Request $req,$id)
    {
        # code...
        $users=User::find($id);
        $users->endSession($req->header('sessionid'));
        return response(["msg"=>"Session Logout","code"=>1],200);
    }

    public function resetPasswordRequst(Request $req)
    {
        # code...
        $users = user::where('email', $req->email)->orWhere('mobaile',$req->email)->first();
        if (!$users) {
            # User Not Found
            return response(["msg"=>"Users Not Find. Wrong Credentials","code"=>0],200);
        }

        $otp= $users->otp();
        passwordRestMailjob::dispatch(["email"=>$users->email,"otp"=>$otp]);
        return response(["msg"=>"$users->name we are send otp in your official email-id or mobaile no.","code"=>1],200);
    }

    public function checkOtp(Request $req)
    {
        # code...
        $users = user::where([['email', $req->email],['otp',$req->otp]])->orWhere([['mobaile',$req->email],['otp',$req->otp]])->first();
        if (!$users) {
            # User Not Found
            return response(["msg"=>"Wrong otp","code"=>0],200);
        }
        $token= $users->makeOtpTocken();
        return response(["msg" => "Pls Reset Your Password", "code" => 1,"token"=>$token], 200);
    }

    public function resetPassword(Request $req)
    {
        # code...
        $users = user::where([['email', $req->email],['otptoken',$req->token]])->orWhere([['mobaile',$req->email],['otptoken',$req->token]])->first();
        if (!$users) {
            # User Not Found
            return response(["msg"=>"Wrong Credentials","code"=>0],200);
        }

        $users->changePassoword($req->password);
        return response(["msg" => "Your Password Successfully Reset", "code" => 1], 200);
    }
}
