<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'producttypes_id',
        'brand_id',
        'name',
        'cost',
        'price',
        'per_unite_price',
        'special_price',
        'uuid',
        'status',
        'discription',
        'expiry_date',
        'menuefacture_date',
        'productcategury',
        'qty',
        'inventury_product_unit',
        'inventury_product_qty',
        'totale_qty',
    ];
    protected static function booted()
    {
        static::addGlobalScope('store', function (Builder $builder) {
            return $builder->with(['productBrand', 'store', 'productType']);
        });
    }
    public function productBrand()
    {
        # code...
        return $this->belongsTo(productbrand::class, 'brand_id', 'id')->select(['id', 'brand_name']);
    }

    public function store()
    {
        # code...
        return $this->belongsTo(store::class, 'store_id', 'id')->select(['id', 'name']);
    }

    public function productType()
    {
        # code...
        return $this->belongsTo(producttypes::class, 'producttypes_id', 'id')->select(['id', 'name']);
    }

}
