<?php

namespace App\Models;

use App\Services\sendSms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class costumer extends Model
{
    use HasFactory,sendSms;

    protected $fillable = [
        "storeid",
        "costocateguryid",
        "costomer_categury",
        "costomer_type",
        "name",
        "last_name",
        "img",
        "city",
        "email",
        "mobaile",
        "whatsapp",
        "gender",
        "divice_id",
        "password",
        "otp",
        "DOB",
        "Anniversary",
        "email_verified_at",
        "mobaile_verified_at",
        "whatsapp_verified_at",
        "email_verified_status",
        "mobaile_verified_status",
        "whatsapp_verified_status",
        "email_notyfication_status",
        "mobaile_notyfication_status",
        "whatsapp_notyfication_status",
        "promo_sms",
        "costomer_notes",
        "address",
    ];

    protected static function booted(){
        static::addGlobalScope('store', function (Builder $builder) {
           return $builder->with(['pastService','pkg','pastAppointment',]);
        });
    }

    public function store()
    {
        # code...
        return $this->belongsTo(store::class,'storeid');
    }

    public function pastService()
    {
        # code...
        return $this->hasMany(invoiceservices::class,'costomer_id','id');
    }

    public function pkg()
    {
        # code...
        return $this->hasMany(pakege::class,'costomer_id','id');
    }

    public function pastAppointment()
    {
        # code...
        return $this->hasMany(appointment::class,'costomer_id','id');
    }
}

