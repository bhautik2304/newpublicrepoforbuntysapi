<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    public function store()
    {
        # code...
        return $this->belongsTo(store::class,'stores_id');
    }
}
