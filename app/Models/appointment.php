<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\getTimeDate;
use App\Services\sendSms;
class appointment extends Model
{
    use HasFactory,getTimeDate,sendSms;
}
