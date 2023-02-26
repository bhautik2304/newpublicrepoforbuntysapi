<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointmentservice extends Model
{
    use HasFactory;

    public function appointment()
    {
        # code...
        return $this->belongsTo(appointment::class,'appointmentid');
    }
}
