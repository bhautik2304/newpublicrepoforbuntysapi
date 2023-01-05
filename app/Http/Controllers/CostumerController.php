<?php

namespace App\Http\Controllers;

use App\Models\costumer;
use App\Models\costumertype;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["costumer" => costumer::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $table = new costumer;
        // storeid
        $table->storeid = $req->storeid;
        $table->costomertypeid = 1;
        // costomer categury

        // costomer info
        $table->name = $req->name;
        $table->last_name = $req->lastname;
        $table->img = $req->img;
        $table->city = $req->city;

        // costomer Contact info
        $table->email = $req->email;
        $table->mobaile = $req->mobaile;
        $table->whatsapp = $req->whatsapp;

        // costumer Wishes
        $table->DOB = $req->DOB;
        $table->Anniversary = $req->Anniversary;

        // notification status
        $table->email_notyfication_status = $req->email_notyfication_status;
        $table->mobaile_notyfication_status = $req->mobaile_notyfication_status;
        $table->whatsapp_notyfication_status = $req->whatsapp_notyfication_status;

        // Costomer Contact Detail
        $table->costomer_notes = $req->costomer_notes;
        $table->address = $req->address;
        $table->gender = $req->gender;
        $table->promo_sms = $req->promo_sms;

        // costomer Save
        $costomer = $table->save();

        if (!$costomer) {
            return response([
                "msg" => "Costumer $req->name $req->lastname Was Not Created",
                "status" => $costomer,
            ]);
        }

        return response([
            "msg" => "Costumer $req->name $req->lastname Created Succesfully",
            "status" => $costomer,
            "Costomer" => $table,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function show(costumer $costumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function edit(costumer $costumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \App\Models\costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $costomer = costumer::where('id',$id)->first();
         $costomer->update([
            "storeid"=>$req->storeid,
            "name"=>$req->name,
            "last_name"=>$req->lastname,
            "img"=>$req->img,
            "city"=>$req->city,
            "email"=>$req->email,
            "mobaile"=>$req->mobaile,
            "whatsapp"=>$req->whatsapp,
            "DOB"=>$req->DOB,
            "Anniversary"=>$req->Anniversary,
            "email_notyfication_status"=>$req->email_notyfication_status,
            "mobaile_notyfication_status"=>$req->mobaile_notyfication_status,
            "whatsapp_notyfication_status"=>$req->whatsapp_notyfication_status,
            "costomer_notes"=>$req->costomer_notes,
            "address"=>$req->address,
            "gender"=>$req->gender,
            "promo_sms"=>$req->promo_sms
        ]);
        // storeid
        if (!$costomer) {
            return response([
                "msg" => "Costumer $req->name $req->lastname Was not updated",
                "status" => $costomer,
            ]);
        }

        return response([
            "msg" => "Costumer $req->name $req->lastname Updated Succesfully",
            "status" => $costomer,
            "Costomer" => $costomer,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(costumer $costumer)
    {
        //
    }

    public function costomertypes(Request $req)
    {
        # code...
        $tabel = new costumertype;
        $tabel->name = $req->name;
        $tabel->save();

        return response(["msg" => "Costomer Type $req->name Created Succesfully"], 200);
    }

    public function costomer(Request $req)
    {
        # code...
        return response(["costumertype" => costumertype::all()], 200);
    }
}
