<?php

namespace App\Http\Controllers;

use App\Models\{user,store};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authcontroller extends Controller
{

    public function login(Request $req)
    {
        # code...

        $user = user::where('email', $req->email)->orWhere('mobaile',$req->email)->first();
        $store=store::where('email', $req->email)->orWhere('mobaile',$req->email)->first();
        $users = $user ?  ["user"=>$user,"store"=>$user->storeid,"roletype"=>$user['role']->name] : ["user"=>$store,"store"=>$store->id,"roletype"=>"store"];
        if (!$users) {
            # User Not Found
            return response(["msg"=>"Users Not Find. Wrong Credentials","code"=>404],200);
        }
        if (!Hash::check($req->password,$users['user']->password)) {
            # code...
            return response(["msg"=>"Wrong Credentials","code"=>404],200);
        }



        return response(["msg"=>"User Find Out ","user"=>$users,"code"=>200],200);


    }
}
