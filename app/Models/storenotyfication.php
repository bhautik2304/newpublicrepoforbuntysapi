<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storenotyfication extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'notificaton_type',
        'notificaton_name',
        'categury_id',
        'notificaton_msg',
        'notificaton_status',
    ];
}
