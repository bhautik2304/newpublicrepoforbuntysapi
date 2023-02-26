<?php

namespace App\Http\Controllers;

use App\Models\productbrand;
use Illuminate\Http\Request;

class productbrands extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return response(["brands" => productbrand::all()], 200);
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
        $productbrand = new productbrand;
        $productbrand->brand_name = $request->name;
        $productbrand->save();

        return response(["msg" => "Created Successfully $productbrand->name"], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productbrand  $productbrand
     * @return \Illuminate\Http\Response
     */
    public function show(productbrand $productbrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productbrand  $productbrand
     * @return \Illuminate\Http\Response
     */
    public function edit(productbrand $productbrand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productbrand  $productbrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,productbrand $product,$id)
    {
        //

        $pb = $product->find($id);
        $product->find($id)->update(['brand_name' => $request->name]);

        return response(["msg" => "updated Successfully $pb->name"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productbrand  $productbrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(productbrand $product,$id)
    {
        //
        $pb = $product->find($id);
        $product->find($id)->destroy($id);
        return response(["msg" => "deleted Successfully $pb->name"]);//$pb->name"]);
    }
}
