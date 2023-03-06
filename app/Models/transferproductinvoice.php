<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transferproductinvoice extends Model
{
    use HasFactory;

    public function productInvoice()
    {
        # code...
        return $this->hasMany(transferproduct::class,'invoice_id','id');
    }
}
