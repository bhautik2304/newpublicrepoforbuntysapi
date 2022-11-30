<?php

namespace App\Http\Controllers;

use App\Models\{invoice,costumer, invoiceproduct, invoiceservices,pakegeservice,pakege};
// use App\Models\;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function invoiceCreate(Request $req)
    {
        # code...
        $invoice=new invoice();
        $invoice->stores_id=$req->stores_id;
        $invoice->invoicetypes_id=$req->invoicetypes_id;
        $invoice->costomer_id=$req->costomer_id;
        $invoice->invoice_no=$req->invoice_no;
        $invoice->paymentmode=$req->paymentmode;
        $invoice->totale=$req->totale;
        $invoice->discount=$req->discount;
        $invoice->disc_amount=$req->disc_amount;
        $invoice->gst_amount=$req->gst_amount;
        $invoice->reward_point=$req->reward_point;
        $invoice->offers_id=$req->offers_id;
        $invoice->offers_due_amount=$req->offers_due_amount;
        $invoice->gst=$req->gst;
        $invoice->status=$req->status;
        $invoice->save();

    }
    public function getMobaileNo($id)
    {
        # code...

        $costomer=costumer::where('id',$id)->get('mobaile')->toArray();
    }

public function productInvoice($req)
{
    # code...
    $product= new invoiceproduct;
    $product->store_id=$req->store_id;
    $product->invoices_id=$req->invoices_id;
    $product->costomer_id=$req->costomer_id;
    $product->staff_id=$req->staff_id;
    $product->totale=$req->totale;
    $product->discount=$req->discount;
    $product->staffcomisan=$req->staffcomisan;
    $product->save();


}

public function serviceInvoice($req)
{
    # code...
    $services= new invoiceservices;
    $services->store_id=$req->store_id;
    $services->invoices_id=$req->invoices_id;
    $services->costomer_id=$req->costomer_id;
    $services->serice_id=$req->serice_id;
    $services->staff_id=$req->staff_id;    $services->totale=$req->totale;
    $services->discount=$req->discount;
    $services->staffcomisan=$req->staffcomisan;
    $services->save();


}

public function pkgInvoice($req)
{
    # code...
    // pakegeservice

    $services= new pakege;
    $services->store_id=$req->store_id;
    $services->invoices_id=$req->invoices_id;
    $services->costomer_id=$req->costomer_id;
    $services->serice_id=$req->serice_id;
    $services->staff_id=$req->staff_id;    $services->totale=$req->totale;
    $services->discount=$req->discount;
    $services->staffcomisan=$req->staffcomisan;
    $services->save();


}
}
