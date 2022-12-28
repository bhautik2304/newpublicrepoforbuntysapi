<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\service;
use Illuminate\Http\Request;
class appointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(['appoitment' => appointment::all()], 200);
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
    public function store(Request $req)
    {
        //
        $appoitment = new appointment;
        $appoitment->storeid = $req->storeid;
        $appoitment->costomer_id = $req->costomer_id;
        $appoitment->staffid = $req->staffid;
        $appoitment->serviceid = $req->serviceid;
        $appoitment->appoitment_date = $req->appoitment_date;
        $appoitment->appoitment_time = $req->appoitment_time;
        $appoitment->appoitment_end_time = $appoitment->getAppoitmentEndTime($req->serviceid,$req->appoitment_time);
        $appoitment->save();


        //send sms to costomer
        $appoitment->bookAppoitmentSms($req->appoitment_date,$req->appoitment_time,$req->storeid,$req->costomer_id);

        if ($req->nextappoitment) {
            # code...
           $this->bookNextAppoitment( $req);
        }

        return response(["msg"=>"created","appoitment"=>$appoitment],200);
        //
    }

    public function storeAppoitment($req, $date)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(appointment $appointment)
    {
        //
    }

    public function bookNextAppoitment($data)
    {
        # code...
        $appoitment = new appointment;
        $appoitment->storeid = $data->storeid;
        $appoitment->costomer_id = $data->costomer_id;
        $appoitment->staffid = $data->staffid;
        $appoitment->serviceid = $data->serviceid;
        $appoitment->appoitment_date = $appoitment->getAppoitmentDays($data->serviceid,$data->appoitment_date);
        $appoitment->appoitment_time = $data->appoitment_time;
        $appoitment->appoitment_end_time = $appoitment->getAppoitmentEndTime($data->serviceid,$data->appoitment_time);
        return $appoitment->save();
    }
}
