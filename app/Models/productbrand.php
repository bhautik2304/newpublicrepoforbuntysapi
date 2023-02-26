<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productbrand extends Model
{
    use HasFactory;

    protected $fillable=['brand_name'];

    public function product()
    {
        # code...
       return $this->hasMany(product::class,'brand_id','id');
    }
}
