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
        $store=store::where('email', $req->email)->orWhere('mobaile',$req->email)->first();
        // return $store;
        $users = $user ?  ["user"=>$user,"store"=>$user->storeid,"roletype"=>$user['role']->name] : ["user"=>$store,"store"=>$store->id,"roletype"=>"store"];
        // dd();
        if (!$users) {
            # User Not Found
            return response(["msg"=>"Users Not Find. Wrong Credentials","code"=>404],200);
        }
        if (!Hash::check($req->password,$users['user']->password)) {
            # code...
            return response(["msg"=>"Wrong Password ".$users['user']->name,"code"=>404],200);
        }



        return response(["msg"=>"User Find Out ","user"=>$users,"code"=>200],200);


    }

    public function resetPasswordRequst(Request $req)
    {
        # code...
        $user = user::where('email', $req->email)->orWhere('mobaile',$req->email)->first();
        $store=store::where('email', $req->email)->orWhere('mobaile',$req->email)->first();
        $users = $user ?  $user : $store;
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
        $user = user::where([['email', $req->email],['otp',$req->otp]])->orWhere([['mobaile',$req->email],['otp',$req->otp]])->first();
        $store=store::where([['email', $req->email],['otp',$req->otp]])->orWhere([['mobaile',$req->email],['otp',$req->otp]])->first();
        $users = $user ?  $user : $store;

        if (!$users) {
            # User Not Found
            return response(["msg"=>"Wrong otp","code"=>0],200);
        }
        $token= $users->makeTocken();
        return response(["msg" => "Pls Reset Your Password", "code" => 1,"token"=>$token], 200);
    }

    public function resetPassword(Request $req)
    {
        # code...
        $user = user::where([['email', $req->email],['token',$req->token]])->orWhere([['mobaile',$req->email],['token',$req->token]])->first();
        $store=store::where([['email', $req->email],['token',$req->token]])->orWhere([['mobaile',$req->email],['token',$req->token]])->first();
        $users = $user ?  $user : $store;

        if (!$users) {
            # User Not Found
            return response(["msg"=>"Wrong Credentials","code"=>0],200);
        }

        $users->changePassoword($req->password);
        return response(["msg" => "Your Password Successfully Reset", "code" => 1], 200);
    }
}
