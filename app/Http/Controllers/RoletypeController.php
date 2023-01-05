<?php

namespace App\Http\Controllers;

use App\Models\{permission,roletype};
use Illuminate\Http\Request;

class RoletypeController extends Controller
{
    //
    public function createRole(Request $req)
    {
        # code...
        $role = new roletype;
        $role->name = $req->name;
        $role->save();

        return response(["msg"=>"New Role $role->name Created sucessfully"]);
    }
    public function givePermissions(Request $req)
    {
        # code...
        $permissions = new permission;
        $permissions->roletype = $req->roleid;
        $permissions->permission_type = $req->name;
        $permissions->permission = $req->access;
        $permissions->save();
        return response(["msg"=>"Give The Access To Role $permissions->permission_type"]);
    }
}
