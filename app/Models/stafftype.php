<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stafftype extends Model
{
    use HasFactory;

   protected $fillable=['name'];

   public function pkges(){
    return $this->hasMany(staff::class,'stafftypesid','id');
}
}
