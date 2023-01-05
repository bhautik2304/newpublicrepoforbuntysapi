<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public function store()
    {
        # code...
        return $this->belongsTo(store::class,'stores_id');
=======

    public function store(){
        return $this->belongsTo(store::class,'store_id','id');
>>>>>>> bf072dd6d817922f849a6a1cf6083b3d8ef899df
    }
}
