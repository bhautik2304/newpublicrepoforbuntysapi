<?php

namespace App\Http\Controllers;

use App\Models\vaucher;
use Illuminate\Http\Request;
use Illuminate\Support\{Str};
class vauchercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(['vaucher'=>vaucher::all()],200);
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

        return rand(1111,9999)."-".rand(1111,9999);

        $vaoucher=new vaucher;
        $vaoucher->vauchertypes_id=$req->vauchertypes_id;
        $vaoucher->costumer_id=$req->costumer_id;
        $vaoucher->invoice_id=$req->invoice_id;
        $vaoucher->uuid=Str::random(6);
        $vaoucher->tnc=$req->tnc;
        $vaoucher->discription=$req->discription;
        $vaoucher->discount=$req->discount;
        $vaoucher->amount=$req->amount;
        $vaoucher->status=$req->status;
        $vaoucher->usedstatus=$req->usedstatus;
        $vaoucher->validto=$req->validto;
        $vaoucher->validityend=$req->validityend;
        $vaoucher->save();

        return response(["msg"=>"vaucher Created"],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vaucher  $vaucher
     * @return \Illuminate\Http\Response
     */
    public function show(vaucher $vaucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vaucher  $vaucher
     * @return \Illuminate\Http\Response
     */
    public function edit(vaucher $vaucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \App\Models\vaucher  $vaucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, vaucher $vaucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vaucher  $vaucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(vaucher $vaucher)
    {
        //
    }
}
