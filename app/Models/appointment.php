<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\getTimeDate;
use App\Services\sendSms;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Scope;

class appointment extends Model
{
    use HasFactory,getTimeDate,sendSms;

    public function store()
    {
        # code...
        return $this->belongsTo(store::class,'store_id');
    }

    public function scopeStoreAppointment($query,$user,$storeId=null,$date=null){
        if ($user=="admin") {
            # code...
            return $this->all();
        }

        return $query->where([['storeid', $storeId],['appoitment_date',$date ? $date : date('Y-m-d')]])->get();
    }

}
