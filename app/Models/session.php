<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    use HasFactory;

    protected $fillable=[
        'usertype',
        'user_id',
        'start',
        'end',
        'session_status',
    ];

    public function users()
    {
        # code...
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
