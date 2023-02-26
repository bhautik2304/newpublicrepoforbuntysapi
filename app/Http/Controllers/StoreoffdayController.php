<?php

namespace App\Http\Controllers;

use App\Models\storeoffday;
use Illuminate\Http\Request;

class StoreoffdayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["closedate" => storeoffday::all()], 200);
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
        $closeday = new storeoffday;
        $closeday->storeid = $request->header('store');
        $closeday->event_name = $request->event_name;
        $closeday->date = $request->date;
        $closeday->detail = $request->detail;
        $closeday->status = false;
        $res = $closeday->save();
        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "Close date Storing Successfully", "code" => 1], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\storeoffday  $storeoffday
     * @return \Illuminate\Http\Response
     */
    public function show(storeoffday $storeoffday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\storeoffday  $storeoffday
     * @return \Illuminate\Http\Response
     */
    public function edit(storeoffday $storeoffday)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\storeoffday  $storeoffday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, storeoffday $storeoffday, $id)
    {
        //
        $res= $storeoffday->find($id)->Update([
            'event_name' => $request->event_name,
            'date' => $request->date,
            'detail' => $request->detail,
        ]);

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "Close date Updating Successfully", "code" => 1], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\storeoffday  $storeoffday
     * @return \Illuminate\Http\Response
     */
    public function destroy(storeoffday $storeoffday,$id)
    {
        //
        $res=$storeoffday->find($id)->destroy($id);

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "Close date Updating Successfully", "code" => 1], 200);
    }
}
