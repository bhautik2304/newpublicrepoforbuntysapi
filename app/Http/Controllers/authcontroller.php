<?php

namespace App\Http\Controllers;

use App\Models\{user,store};
use Illuminate\Http\Request;

class authcontroller extends Controller
{

    public function login(Request $req)
    {
        # code...

        $user = user::where('email', $req->email)->orWhere('mobaile',$req->email)->first();
        $users = $user ? $user : store::where('email', $req->email)->orWhere('mobaile',$req->email)->first();
        if (!$users) {
            # code...
            return response(["msg"=>"Users Not Find. Wrong Credentials"],200);
        }

        return response(["msg"=>"User Find Out ","user"=>$users],200);


    }
}
