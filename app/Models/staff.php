<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class staff extends Model
{
    use HasFactory;
    protected $table = 'staff';

    protected static function booted(){
        static::addGlobalScope('store', function (Builder $builder) {
           return $builder->with(['stafftype','store']);
        });
    }
    protected $fillable=[
        'firstname',
        'stafftypesid',
        'secondname',
        'lastname',
        'email',
        'mobaile',
        'whatsapp_mobaile',
        'birthday',
        'annyversy_day',
        'gender',
        'maritial_status',
        'city',
        'state',
        'pin',
        'per_add',
        'res_add',
        'job_starting_time',
        'job_hours',
        'weekend',
        'sallery',
        'product_sale',
        'service_sale',
        'service_exc',
        'pkg_sale',
        'addhar_no',
        'pan_no',
        'drl_no',
        'insuriuns',
        'mediclaim',
        'pf',
        'bank_account_no',
        'bank_account_ifc',
        'bank_name',
        'bank_account_holder_name',
    ];

    public function stafftype()
    {
        # code...
        $data=$this->belongsTo(stafftype::class,'stafftypesid','id')->select(['name','id']);
        return $data;
    }

    public function store()
    {
        # code...
        return $this->belongsTo(store::class,'storeid','id')->select(['name','id','city']);
    }
}
