<?php

namespace App\Http\Controllers;

use App\Events\storeUpdate;
use App\Models\service;
use Composer\EventDispatcher\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["service"=>service::all()],200);
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
        $table=new service;
        $table->servicetypeid=$req->servicetypeid;
        $table->name=$req->name;
        $table->price=$req->price;
        $table->offer_price=$req->offer_price;
        $table->minprice=$req->minprice;
        $table->service_duration=$req->service_duration;
        $table->product_id=$req->product_id;
        $table->servis_cost=$req->servis_cost;
        $table->service_time=$req->service_time;
        $table->service_duration=$req->service_duration;
        $table->save();
        // Broadcast::event
        event(new storeUpdate('Update Store'));
        // Event::fire();
        return response(["msg"=>"Service $req->name Created Succesfully",'code'=>1],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req ,$id)
    {
        //
        $service=service::find($id)->first();
        $service->update( [
            'servicetypeid' => $req->servicetypeid,
            'name' => $req->name,
            'price' => $req->price,
            'minprice' => $req->minprice,
            'service_duration' => $req->service_duration,
            'service_time' => $req->service_time,
        ]);

        return response(["msg"=>"updated $service->name",'code'=>2],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $services,$id)
    {
        //
        $service = service::find($id)->first();
        $service->delete();
        return response(["msg"=>"delate Service $service->name",'code'=>0],200);
    }
}
