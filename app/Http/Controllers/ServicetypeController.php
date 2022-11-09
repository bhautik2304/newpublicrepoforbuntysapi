<?php

namespace App\Http\Controllers;

use App\Models\{servicetype,costumertype};
use Illuminate\Http\Request;

class ServicetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["servicetype"=>servicetype::all()],200);
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

        $tabel=new servicetype;
        $tabel->name=$req->name;
        $tabel->save();

        return response(["msg"=>"Service Type $req->name Created Succesfully"],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function show(servicetype $servicetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function edit(servicetype $servicetype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \App\Models\servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, servicetype $servicetype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servicetype  $servicetype
     * @return \Illuminate\Http\Response
     */
    public function destroy(servicetype $servicetype)
    {
        //
    }
}
