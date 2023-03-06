<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(["product" => product::all()], 200);

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
        $product = new product;
        $product->store_id = $req->header('Store');
        $product->productcategury_id = $req->producttypes_id;
        $product->brand_id = $req->brand_id;
        $product->producttypes = $req->productcategury;
        $product->name = $req->name;
        $product->cost = $req->cost;
        $product->price = $req->price;
        $product->per_unite_price = $req->per_unite_price;
        $product->unite_in_product = $req->unite_in_product;
        $product->special_price = $req->special_price;
        $product->uuid = Str::uuid();
        $product->discription = $req->discription;
        $product->inventury_product_qty = $req->qty;
        $product->inventury_product_alert = $req->alertqty;
        $product->save();

        return response(["msg" => "Product Created Successfully $product->name"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = new product;
        $product->find($id)->update([
            'store_id' =>$request->header('Store'),
            'productcategury_id' => $request->producttypes_id,
            'producttypes' => $request->productcategury,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'cost' => $request->cost,
            'price' => $request->price,
            'per_unite_price' => $request->per_unite_price,
            'unite_in_product' => $request->unite_in_product,
            'special_price' => $request->special_price,
            'uuid' => $request->uuid,
            'discription' => $request->discription,
            'inventury_product_qty' => $request->qty,
            'inventury_product_alert' => $request->alertqty,
        ]);

        return response(["msg" => "Product Updated Successfully"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
