<?php

namespace App\Http\Controllers;

use App\Models\vauchertype;
use Illuminate\Http\Request;

class vauchertypecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["vaochertype"=>vauchertype::all()],200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $vauchertype=new vauchertype;
        $vauchertype->name=$request->name;
        $vauchertype->save();
        return response(["msg"=>"Created $vauchertype->name Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vauchertype  $vauchertype
     * @return \Illuminate\Http\Response
     */
    public function show(vauchertype $vauchertype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vauchertype  $vauchertype
     * @return \Illuminate\Http\Response
     */
    public function edit(vauchertype $vauchertype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vauchertype  $vauchertype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vauchertype $vauchertype,$id)
    {
        //
        $vt=$vauchertype->find($id);
        $vauchertype->find($id)->update(['name'=>$request->name]);
        return response(["msg"=>"Updated Successfully $vt->name"],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vauchertype  $vauchertype
     * @return \Illuminate\Http\Response
     */
    public function destroy(vauchertype $vauchertype,$id)
    {
        //
        $vts=$vauchertype->find($id);
        $vauchertype->find($id)->destroy($id);
        return response(["msg"=>"Deleted Successfully $vts->name"],200);
    }
}
