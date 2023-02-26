<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storeoffday extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'date',
        'detail',
        'status',
        'status',
    ];
}
