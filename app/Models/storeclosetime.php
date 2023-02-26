<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storeclosetime extends Model
{
    use HasFactory;

    protected $table="storeclosetimes";

    protected $fillable=[
        'day',
        'opentime',
        'closetime',
    ];
}
