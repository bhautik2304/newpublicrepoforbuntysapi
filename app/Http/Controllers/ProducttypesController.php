<?php

namespace App\Http\Controllers;

use App\Models\producttypes;
use Illuminate\Http\Request;

class ProducttypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["producttypes" => producttypes::all()], 200);
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
        $tabel = new producttypes;
        $tabel->name = $req->name;
        $tabel->save();

        return response(["msg"=>"Product Type $req->name Created Succesfully"],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producttypes  $producttypes
     * @return \Illuminate\Http\Response
     */
    public function show(producttypes $producttypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producttypes  $producttypes
     * @return \Illuminate\Http\Response
     */
    public function edit(producttypes $producttypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \App\Models\producttypes  $producttypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, producttypes $producttypes,$id)
    {
        //
        $pb = $producttypes->find($id);
        $producttypes->find($id)->update(['name' => $req->name]);

        return response(["msg" => "updated Successfully $pb->name"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producttypes  $producttypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(producttypes $producttypes,$id)
    {
        //
        $pb = $producttypes->find($id);
        $producttypes->find($id)->destroy($id);
        return response(["msg" => "deleted Successfully $pb->name"]);
    }
}
