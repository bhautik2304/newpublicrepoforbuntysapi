<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @$req \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["staff"=>staff::all()],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @$req \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @$req \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $table=new staff;
        $table->storeid=$req->storeid;
        $table->stafftypesid=$req->stafftypesid;
        $table->name=$req->name;
        $table->lastname=$req->lastname;
        $table->gender=$req->gender;
        $table->img=$req->img;
        $table->designation=$req->designation;
        $table->address=$req->address;
        $table->city=$req->city;
        $table->email=$req->email;
        $table->mobaile=$req->mobaile;
        $table->whatsapp=$req->whatsapp;
        $table->workstarttime=$req->workstarttime;
        $table->workemdtime=$req->workemdtime;
        $table->save();

        return response(["msg"=>"Staff $req->name $req->lastname Created Succesfully"],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\staff  $staff
     * @$req \Illuminate\Http\Response
     */
    public function show(staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\staff  $staff
     * @$req \Illuminate\Http\Response
     */
    public function edit(staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \App\Models\staff  $staff
     * @$req \Illuminate\Http\Response
     */
    public function update(Request $req, staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\staff  $staff
     * @$req \Illuminate\Http\Response
     */
    public function destroy(staff $staff)
    {
        //
    }
}
