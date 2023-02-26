<?php

namespace App\Models;

use Faker\Core\Uuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{Hash, Mail};
use Illuminate\Support\Str;

class store extends Model
{
    use HasFactory;

    // protected $fillable = ["name","otp"];
//     protected static function booted()
//     {
//         static::addGlobalScope('costomer', function (Builder $builder) {
//            return $builder->with(['costomer','appoitment','users','invoices','stuff']);
//         });
//     }
//     public function costomer()
// {
//     return $this->hasMany(costumer::class,'storeid','id');
// }



    // public function appoitment()
// {

    //     return $this->hasMany(appointment::class,'storeid','id');
// }

    // public function offers()
// {
//     return $this->hasMany(offer::class,'storeid','id');
// }

    // public function users()
// {

    //     return $this->hasMany(User::class,'storeid','id');
// }

    // public function stuff()
// {

    //     return $this->hasMany(staff::class,'storeid','id');
// }

    // // public function products()
// // {
// //     return $this->hasMany(product::class,'storeid','id');
// // }

    // public function invoices()
// {
//     return $this->hasMany(invoice::class,'stores_id','id');
// }

    // protected static function booted(){
    //     static::addGlobalScope('store', function (Builder $builder) {
    //        return $builder->with(['invoice','appoitment']);
    //     });
    // }
    protected $fillable = [
        'name',
        'city_id',
        'email',
        'store_email',
        'mobaile',
        'whatsapp_no',
        'password',
        'opentime',
        'closetime',
        'address',
        'pin',
        'city',
        'state',
        'insta_link',
        'facebook_link',
        'whatsapp_chat_link',
        'twitter',
        'youtube',
        'session',
        'session_start',
        'session_end',
        'map',
        'lat',
        'long',
        'divice_id',
        'resetpassword_token',
        'session_token',
        'otp'
    ];

    public function invoice()
    {
        return $this->hasMany(invoice::class, 'store_id', 'id');
    }


    public function appoitment()
    {
        return $this->hasMany(appointment::class, 'storeid', 'id');
    }

    public function costumer()
    {
        return $this->hasMany(costumer::class, 'storeid', 'id');
    }

    public function staff()
    {
        return $this->hasMany(stuff::class, 'storeid', 'id');
    }

    public function product()
    {
        return $this->hasMany(product::class, 'storeid', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'storeid', 'id');
    }

    public function expense()
    {
        return $this->hasMany(expens::class, 'storeid', 'id');
    }

    public function invoice_product()
    {
        return $this->hasMany(expens::class, 'store_id', 'id');
    }

    public function invoice_service()
    {
        return $this->hasMany(expens::class, 'storeid', 'id');
    }

    public function pkges()
    {
        return $this->hasMany(expens::class, 'storeid', 'id');
    }

    public function scopeUserViceData($query, $user, $id = null)
    {
        # code...
        if ($user == 'admin') {
            # code...
            return store::all();
        } else {
            # code...
            return store::where('id', $id)->get();
        }
    }

    public function otp()
    {
        # code...
        $otp = rand(0000, 9999);
        $this->update(['otp' => $otp]);
        return $otp;
    }

    public function changePassoword($password)
    {
        # code...
        return $this->update(['password' => Hash::make($password)]);
    }

    public function makeTocken()
    {
        # code...
        $token = Str::uuid();
        $this->update(['otptoken' => $token]);
        return $token;
    }

    public function startSession()
    {
        # code...
        $token = Str::uuid();
        $this->update(['token' => $token]);
        $this->update(['session' => true]);
        return $token;
    }

    public function endSession()
    {
        # code...
        $token = Str::uuid();
        $this->update(['session_token' => null]);
        $this->update(['session' => false]);
        return $token;
    }
}
