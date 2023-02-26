<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costumertype extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'minsale',
        'maxsale'
    ];

    public function costumer()
    {
        # code...
        return $this->hasMany(costumer::class,'costocateguryid','id');
    }
}
