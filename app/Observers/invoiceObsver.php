<?php

namespace App\Observers;

use App\Models\invoice;

class invoiceObsver
{
    /**
     * Handle the invoice "created" event.
     *
     * @param  \App\Models\invoice  $invoice
     * @return void
     */
    public function created(invoice $invoice)
    {
        //
    }

    /**
     * Handle the invoice "updated" event.
     *
     * @param  \App\Models\invoice  $invoice
     * @return void
     */
    public function updated(invoice $invoice)
    {
        //
    }

    /**
     * Handle the invoice "deleted" event.
     *
     * @param  \App\Models\invoice  $invoice
     * @return void
     */
    public function deleted(invoice $invoice)
    {
        //
    }

    /**
     * Handle the invoice "restored" event.
     *
     * @param  \App\Models\invoice  $invoice
     * @return void
     */
    public function restored(invoice $invoice)
    {
        //
    }

    /**
     * Handle the invoice "force deleted" event.
     *
     * @param  \App\Models\invoice  $invoice
     * @return void
     */
    public function forceDeleted(invoice $invoice)
    {
        //
    }
}
