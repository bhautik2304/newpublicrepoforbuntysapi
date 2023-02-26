<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        // dd($req->header('store'));
        return response(["Store" => store::userViceData($req->header('UserType'), $req->header('Store'))], 200);
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
        if (!($req->header('UserType') == 'masteradmin')) {
            return response(["msg" => "You can't Create Store"], 200);
        }
        $store = new store;
        $store->city_id = $this->createCity($req->city);
        $store->name = $req->name;
        $store->email = $req->email;
        $store->store_email = $req->store_email;
        $store->mobaile = $req->mobaile;
        $store->whatsapp_no = $req->whatsapp_no;
        $store->address = $req->address;
        $store->pin = $req->pin;
        $store->city = $req->city;
        $store->state = $req->state;
        $store->insta_link = $req->insta_link;
        $store->facebook_link = $req->facebook_link;
        $store->whatsapp_chat_link = $req->whatsapp_chat_link;
        $store->twitter = $req->twitter;
        $store->youtube = $req->youtube;
        $store->map = $req->map;
        $store->save();

        $this->createUsers($store->id,$req);

        return response(["msg" => "$req->name Store Created Succesfully in $req->city"], 200);
    }

    public function createCity($name)
    {
        # code...
        $citys = city::where('name', $name)->first();
        if (!$citys) {
            # code...
            $citys = new city;
            $citys->name = $name;
            $citys->save();
            // dd($city->id);
            return $citys->id;
        }
        return $citys->id;
    }

    public function createUsers($id,$req)
    {
        # code...
        $users = new User;
        $users->store_id = $id;
        $users->name = $req->name;
        $users->role = "store";
        $users->email = $req->email;
        $users->mobaile = $req->mobaile;
        $users->password = Hash::make($req->password);
        $users->save();
        return 1;
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
    public function update(Request $req, $id)
    {
        //
        if (!($req->header('UserType') == 'masteradmin')) {
            return response(["msg" => "You can't Update Store Data","code"=>403], 200);
        }
        $store = store::where('id', $id)->first();
        $action = $store->update([
            "name" => $req->name,
            "email" => $req->email,
            "store_email" => $req->store_email,
            "mobaile" => $req->mobaile,
            "whatsapp_no" => $req->whatsapp_no,
            "password" => $req->password,
            "address" => $req->address,
            "pin" => $req->pin,
            "city" => $req->city,
            "state" => $req->state,
            "insta_link" => $req->insta_link,
            "facebook_link" => $req->facebook_link,
            "whatsapp_chat_link" => $req->whatsapp_chat_link,
            "twitter" => $req->twitter,
            "youtube" => $req->youtube,
            "map" => $req->map,
        ]);

        if (!$action) {
            # code...
            return response(["msg" => "oops Some Error accord", "code" => 422], 200);
        }

        return response(["msg" => "Your Changes Successfully Done", "Store" => $store, "code" => 200], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        //
        // return $id;
        if (!($req->header('UserType') == 'admin')) {
            return response(["msg" => "You can't Delete Store Data"], 200);
        }

        $stores = store::find($id);
        $stores->destroy($id);
        return response(["msg" => "You Delate store $req->name Sucessfully"], 200);
    }

    public function updateStoreTime(Request $req, store $store, $id)
    {
        # code...
        if (!($req->header('UserType') == 'admin')) {
            return response(["msg" => "You can't Update Store Time"], 200);
        }
        $stores = $store->find($id)->update(['opentime' => $req->opentime, 'closetime' => $req->closetime,]);
        $stores = $store->find($id);
        return response(["msg" => "Store Time Updated $stores->name closing at " . date("h:i a", strtotime($stores->closetime)) . ""], 200);
    }

    public function updateStoreSessionTime(Request $req, store $store, $id)
    {
        # code...
        if (!($req->header('UserType') == 'admin')) {
            return response(["msg" => "You can't Update Store Time"], 200);
        }
        $stores = $store->find($id)->update(['session_start' => $req->opentime, 'session_end' => $req->closetime,]);
        $stores = $store->find($id);
        return response(["msg" => "Store Time Updated $stores->name closing at " . date("h:i a", strtotime($stores->closetime)) . ""], 200);
    }
}
