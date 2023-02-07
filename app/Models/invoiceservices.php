<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceservices extends Model
{
    use HasFactory;

    public function costomer()
    {
        # code...
        return $this->belongsTo(store::class,'costomer_id');
    }
}
