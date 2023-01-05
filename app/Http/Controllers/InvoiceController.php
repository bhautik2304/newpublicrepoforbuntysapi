<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\invoiceservices;
use App\Models\staff;
use Illuminate\Http\Request;
// use PhpParser\JsonDecoder;

class InvoiceController extends Controller
{
    //
    public function invoiceGenrater(Request $req)
    {
        # code...
        $invoice=new invoice;
        // $invoice->
        $invoice->store_id=$req->store_id;
        $invoice->costomer_id=$req->costomer_id;
        $invoice->invoicetypes_id=$req->invoicetypes_id;
        $invoice->invoice_no=$req->invoice_no;
        $invoice->totale=$req->totale;
        $invoice->discount_is=$req->discount_is;
        $invoice->discounted_amount=$req->discounted_amount;
        $invoice->discount=$req->discount;
        $invoice->reward_point_readeem=$req->reward_point_readeem;
        $invoice->reward_point_amount=$req->reward_point_amount;
        $invoice->reward_point=$req->reward_point;
        $invoice->vaocher=$req->vaocher;
        $invoice->vaocher_code=$req->vaocher_code;
        $invoice->vaocher_amount=$req->vaocher_amount;
        $invoice->gst=$req->gst;
        $invoice->gst_amount=$req->gst_amount;
        $invoice->paid=$req->paid;
        $invoice->save();

        // $service = json_encode($req->service);

        foreach ($req->service as $services) {
            # code...
            $invoiceService= new invoiceservices;
            $invoiceService->invoice_id = $invoice->id;
            $invoiceService->costomer_id = $req->costomer_id;
            $invoiceService->service_id = $services['serviceId'];
            $invoiceService->staff_id = $services['staffId'];
            $invoiceService->totale = $services['totale'];
            $invoiceService->staffcomisan = $this->getStuffCommision($services['staffId'],$services['totale']);
            $invoiceService->save();
        }
        return response(["msg"=>"invoice Created"],200);
    }

    public function getStuffCommision($stuffId,$totale)
    {
        # code...
        $stuff = staff::where('id', $stuffId)->first();
        $stuffPersant = (int) $stuff->service_sale;
        $commison=$totale * ($stuffPersant / 100);
        return $commison;
    }

    public function getInvoice()
    {
        # code...
        $date = date('Y-m-d');
        $data=invoice::where('invoiceDate',$date)->with('store')->get();
        $count=$data->sum('totale');
        return response(["invoice"=>$data,"totle"=>$count],200);
    }
}

/*
*/
