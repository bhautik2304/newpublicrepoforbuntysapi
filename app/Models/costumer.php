<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\sendSms;
class costumer extends Model
{
    use HasFactory,sendSms;

    protected $fillable = [
        "storeid",
        "costomertypeid",
        "name",
        "last_name",
        "img",
        "city",
        "email",
        "mobaile",
        "whatsapp",
        "DOB",
        "Anniversary",
        "email_notyfication_status",
        "mobaile_notyfication_status",
        "whatsapp_notyfication_status",
        "costomer_notes",
        "address",
        "gender",
        "promo_sms",
    ];


}
