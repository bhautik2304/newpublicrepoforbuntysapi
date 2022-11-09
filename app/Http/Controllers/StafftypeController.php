<?php

namespace App\Http\Controllers;

use App\Models\stafftype;
use Illuminate\Http\Request;

class StafftypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response(["stafftype"=>stafftype::all()],200);
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
        $tabel=new stafftype;
        $tabel->name=$req->name;
        $tabel->save();

        return response(["msg"=>"Staff Type $req->name Created Succesfully"],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stafftype  $stafftype
     * @return \Illuminate\Http\Response
     */
    public function show(stafftype $stafftype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stafftype  $stafftype
     * @return \Illuminate\Http\Response
     */
    public function edit(stafftype $stafftype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \App\Models\stafftype  $stafftype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, stafftype $stafftype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stafftype  $stafftype
     * @return \Illuminate\Http\Response
     */
    public function destroy(stafftype $stafftype)
    {
        //
    }
}
