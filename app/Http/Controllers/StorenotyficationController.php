<?php

namespace App\Http\Controllers;

use App\Models\storenotyfication;
use Illuminate\Http\Request;

class StorenotyficationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["storenotyfication"=>storenotyfication::all()],200);
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

        $newnotification=new storenotyfication;
        $newnotification->store_id=$request->header('store');
        $newnotification->notificaton_type=$request->notificaton_type;
        $newnotification->notificaton_name=$request->notificaton_name;
        $newnotification->categury_id=$request->categury_id;
        $newnotification->notificaton_msg=$request->notificaton_msg;
        $newnotification->notificaton_status=$request->notificaton_status;
        $res=$newnotification->save();

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "Notification Storing Successfully", "code" => 1], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\storenotyfication  $storenotyfication
     * @return \Illuminate\Http\Response
     */
    public function show(storenotyfication $storenotyfication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\storenotyfication  $storenotyfication
     * @return \Illuminate\Http\Response
     */
    public function edit(storenotyfication $storenotyfication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\storenotyfication  $storenotyfication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, storenotyfication $storenotyfication,$id)
    {
        //
        $res=$storenotyfication->find($id)->update([
            'notificaton_type'=>$request->notificaton_type,
            'notificaton_name'=>$request->notificaton_name,
            'categury_id'=>$request->categury_id,
            'notificaton_msg'=>$request->notificaton_msg,
            'notificaton_status'=>$request->notificaton_status,
        ]);

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "Notification Updating Successfully", "code" => 1], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\storenotyfication  $storenotyfication
     * @return \Illuminate\Http\Response
     */
    public function destroy(storenotyfication $storenotyfication,$id)
    {
        //
        $res=$storenotyfication->find($id)->destroy($id);

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "Notification Delete Successfully", "code" => 1], 200);
    }
}
