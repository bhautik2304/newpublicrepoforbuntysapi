<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceproduct extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the invoiceproduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo(invoice::class, 'invoice_id', 'id');
    }



}
