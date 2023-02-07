<?php
namespace App\Traits;

use Illuminate\Support\Str;
use App\Models\{costumer, smsTemplate, store};

trait getSmsTemplate {
    // public $replaseArr = config('sms.smsConst');
   public function smsTeplate($id,$smsReplaceValue)
   {
    # code...
        $sms=smsTemplate::find($id)->template_msg;
        $smsTemp=Str::replace(
            config('sms.smsConst'),
            $smsReplaceValue,
            $sms
        );

        return $smsTemp;
   }

   public function storeConst(
$store_id=null,
$costomer_id=null,
$appointment_id=null,
$offers_code=null,
$voucher_code=null,
$costomer_offers_code=null
   )
   {
    # code...

$store_name=$store_id ? store::find($store_id)->name : "";
$costomer_full_name=$costomer_id ? costumer::find($costomer_id)->name." ".costumer::find($costomer_id)->last_name  : "";
$costomer_name=$costomer_id ? costumer::find($costomer_id)->name : "";
$store_location=$store_id ? store::find($store_id)->name : "";
$booking_date="";
$booking_time=$booking_date ? : "";
$appointment_confirmation=$booking_time ? : "";
$feedback_link=$appointment_confirmation ? : "";
$offers_code=$feedback_link ? : "";
$voucher_code=$offers_code ? : "";
$rewardpoint_code=$voucher_code ? : "";
$costomer_offers_code=$rewardpoint_code ? : "";
    return [
        $store_name,
        $costomer_full_name,
        $costomer_name,
        $store_location,
        $feedback_link,
        $booking_date,
        $booking_time,
        $appointment_confirmation,
        $feedback_link,
        $offers_code,
        $voucher_code,
        $rewardpoint_code,
        $costomer_offers_code,
               ];
   }
}
