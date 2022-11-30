<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    protected static function booted()
    {
        static::addGlobalScope('costomer', function (Builder $builder) {
            $builder->with(['costomer','appoitment','users','invoices','stuff']);
        });
    }
    public function costomer()
{
    return $this->hasMany(costumer::class,'storeid','id');
}

public function appoitment()
{

    return $this->hasMany(appointment::class,'storeid','id');
}

public function offers()
{
    return $this->hasMany(offer::class,'storeid','id');
}

public function users()
{

    return $this->hasMany(User::class,'storeid','id');
}

public function stuff()
{

    return $this->hasMany(staff::class,'storeid','id');
}

// public function products()
// {
//     return $this->hasMany(product::class,'storeid','id');
// }

public function invoices()
{
    return $this->hasMany(invoice::class,'stores_id','id');
}


}
