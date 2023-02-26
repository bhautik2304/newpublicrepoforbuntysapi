<?php

namespace App\Http\Controllers;

use App\Models\storeclosetime;
use Illuminate\Http\Request;

class StorecloseController extends Controller
{
    //
    public function index()
    {
        # code...
        return  response(["storetiming"=>storeclosetime::all()],200);
    }

    public function store(Request $req)
    {
        # code...
        $closingTime=new storeclosetime;
        $closingTime->store_id = $req->header('store');
        $closingTime->day = $req->day;
        $closingTime->opentime =$req->opentime;
        $closingTime->closetime = $req->closetime;
        $res=$closingTime->save();

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "Store Closing Time Created Successfully", "code" => 1], 200);
    }

    public function update(Request $req,storeclosetime $closetime,$id)
    {
        # code...
        $res=$closetime->find($id)->update([
            'day'=>$req->day,
            'opentime'=>$req->opentime,
            'closetime'=>$req->closetime,
        ]);

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "Store Closing Time Updating Successfully", "code" => 1], 200);
    }

    public function destroy(storeclosetime $closetime,$id)
    {
        # code...
        $res=$closetime->find($id)->destroy($id);

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "Store Closing Time Delete Successfully", "code" => 1], 200);
    }
}
