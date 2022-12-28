<?php

namespace App\Http\Controllers;

use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["Store"=>store::all()],200);
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

        $store=new store;
        $store->name=$req->name;
        $store->avatar=$req->avatar;
        $store->email=$req->email;
        $store->mobaile=$req->mobaile;
        // $store->whatsapp=$req->mobaile;
        $store->password=Hash::make($req->password);
        $store->opentime=$req->opentime;
        $store->closetime=$req->closetime;
        $store->address=$req->address;
        $store->pin=$req->pin;
        $store->city=$req->city;
        $store->map=$req->map;
        $store->save();

        return response(["msg"=>"$req->name Store Created Succesfully"],200);
    }
/*

*/
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$id)
    {
        //
        $store = store::where('id', $id)->first();
        $action=$store->update([
            'name'=>$req->name,
            'avatar'=>$req->avatar,
            'email'=>$req->email,
            'mobaile'=>$req->mobaile,
            'password'=>Hash::make($req->password),
            'opentime'=>$req->opentime,
            'closetime'=>$req->closetime,
            'address'=>$req->address,
            'pin'=>$req->pin,
            'city'=>$req->city,
            'map'=>$req->map
        ]);

        if (!$action) {
            # code...
            return response(["msg"=>"oops Some Error accord","code"=>422],200);
        }

        return response(["msg"=>"Your Changes Successfully Done","Store"=>$store,"code"=>200],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(store $store)
    {
        //
    }
}
