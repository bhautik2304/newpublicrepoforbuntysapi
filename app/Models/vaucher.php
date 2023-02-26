<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vaucher extends Model
{
    use HasFactory;

    protected $fillable=[
        'vauchertypes_id',
        'costumer_id',
        'invoice_id',
        'uuid',
        'tnc',
        'discription',
        'discount',
        'amount',
        'status',
        'usedstatus',
        'validto',
        'validityend',
    ];


}
