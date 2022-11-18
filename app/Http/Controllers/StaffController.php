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
$table->storeid=$req->StoreId;
$table->stafftypesid=$req->stufftype;

$table->name=$req->middelname;
$table->lastname=$req->lastname;
$table->firstname=$req->firstname;
$table->email=$req->email;
$table->mobaile=$req->mobaile;
$table->whatsapp_mobaile=$req->whatmobaile;


$table->birthday=$req->birthday;
$table->annyversy_day=$req->marrige_anny;


$table->profile_img=$req->img;
$table->gender=$req->gender;
$table->maritial_status=$req->marit_status;


$table->city=$req->city;
$table->state=$req->state;
$table->pin=$req->pin;
$table->per_add=$req->permenentAddress;
$table->res_add=$req->ResidentAddresses;


$table->job_starting_time=$req->jobstart;
$table->job_hours=$req->jobhours;
$table->weekend=$req->Weekend;


$table->sallery=$req->sallery;
$table->product_sale=$req->ProductSale;
$table->service_sale=$req->serviceSale;
$table->service_exc=$req->serviceExicute;
$table->pkg_sale=$req->PkgSale;


$table->addhar_doc_url=$req->;
$table->pan_doc_url=$req->;
$table->drl_doc_url=$req->;

$table->addhar_no=$req->;
$table->pan_no=$req->;
$table->drl_no=$req->;


$table->insuriuns=$req->ins;
$table->mediclaim=$req->mediClaim;
$table->pf=$req->pf;


$table->bank_account_no=$req->bank_account_no;
$table->bank_account_ifc=$req->bank_account_ifc;
$table->bank_name=$req->bank_name;
$table->bank_account_holder_name=$req->bank_account_holder_name;
$table->bank_account_doc=$req->bank_account_doc;
        $table->save();

        return response(["msg"=>"Staff $req->name $req->lastname Created Succesfully"],200);
    }

/*
firstname: firstname,
      lastname: lastname,
      middelname: middelname,



      img:img,
      gender:gender ,

*/



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
