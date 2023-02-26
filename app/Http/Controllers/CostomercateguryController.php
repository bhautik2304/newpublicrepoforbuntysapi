<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\costumertype;
class CostomercateguryController extends Controller
{
    //
    public function index(Request $req)
    {
        # code...
        return response(["costumertype" => costumertype::all()], 200);
    }

    //
    public function store(Request $req)
    {
        # code...
        $tabel = new costumertype;
        $tabel->name = $req->name;
        $tabel->minsale = $req->minsale;
        $tabel->maxsale = $req->maxsale;
        $tabel->save();

        return response(["msg" => "Costomer Type $req->name Created Succesfully"], 200);
    }

    //
    public function update(Request $req,costumertype $ct,$id)
    {
        # code...
        $ct->find($id)->update(['name'=>$req->name,'minsale'=>$req->minsale,'maxsale'=>$req->maxsale,]);
        return response(["msg" => "Costomer Type $req->name Upadted Succesfully"], 200);
    }

    //
    public function destroy(costumertype $ct,$id)
    {
        # code...
        $cts=$ct->find($id);
        $ct->destroy($id);
        return response(["msg" => "Costomer Type $cts->name Deleted Succesfully"], 200);
    }

}
