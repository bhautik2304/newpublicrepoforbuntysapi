<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;

    protected static function booted(){
        static::addGlobalScope('store', function (Builder $builder) {
           return $builder->with(['invoice','appoitment']);
        });
    }
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'mobaile',
        'password',
        'opentime',
        'closetime',
        'address',
        'pin',
        'city',
        'map',
    ];

    public function invoice(){
        return $this->hasMany(invoice::class,'store_id','id');
    }

    public function appoitment(){
        return $this->hasMany(appointment::class,'storeid','id');
    }

    public function costumer(){
        return $this->hasMany(costumer::class,'storeid','id');
    }

    public function staff(){
        return $this->hasMany(stuff::class,'storeid','id');
    }

    public function product(){
        return $this->hasMany(product::class,'storeid','id');
    }

    public function users(){
        return $this->hasMany(User::class,'storeid','id');
    }

    public function expense(){
        return $this->hasMany(expens::class,'storeid','id');
    }

    public function invoice_product(){
        return $this->hasMany(expens::class,'store_id','id');
    }

    public function invoice_service(){
        return $this->hasMany(expens::class,'storeid','id');
    }

    public function pkges(){
        return $this->hasMany(expens::class,'storeid','id');
    }

    public function scopeUserViceData($query,$user,$id=null)
    {
        # code...
        if ($user == 'admin') {
            # code...
            return store::all();
        }else {
            # code...
            return store::where('id', $id)->get();
        }
    }
}
