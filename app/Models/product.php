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
        'productcategury_id',
        'brand_id',
        'producttypes',
        'name',
        'cost',
        'price',
        'per_unite_price',
        'unite_in_product',
        'special_price',
        'is_special_price',
        'uuid',
        'status',
        'discription',
        'inventury_product_qty',
        'inventury_product_alert',
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
