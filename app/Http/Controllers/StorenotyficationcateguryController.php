<?php

namespace App\Http\Controllers;

use App\Models\storenotyficationcategury;
use Illuminate\Http\Request;

class StorenotyficationcateguryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["notyficationcategury"=>storenotyficationcategury::all()],200);
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
        $notcate=new storenotyficationcategury;
        $notcate->name=$request->name;
        $res=$notcate->save();

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "Notification Categury Storing Successfully", "code" => 1], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\storenotyficationcategury  $storenotyficationcategury
     * @return \Illuminate\Http\Response
     */
    public function show(storenotyficationcategury $storenotyficationcategury)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\storenotyficationcategury  $storenotyficationcategury
     * @return \Illuminate\Http\Response
     */
    public function edit(storenotyficationcategury $storenotyficationcategury)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\storenotyficationcategury  $storenotyficationcategury
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, storenotyficationcategury $storenotyficationcategury,$id)
    {
        //
        $res=$storenotyficationcategury->find($id)->update(["name"=>$request->name]);

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => " Notification Categury Updating Successfully", "code" => 1], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\storenotyficationcategury  $storenotyficationcategury
     * @return \Illuminate\Http\Response
     */
    public function destroy(storenotyficationcategury $storenotyficationcategury,$id)
    {
        //
        $res=$storenotyficationcategury->find($id)->destroy($id);

        if (!$res) {
            # code...
            return response(["msg" => "Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => " Notification Categury Delete Successfully", "code" => 1], 200);
    }
}
