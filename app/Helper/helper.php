<?php

use App\Models\{costumer, costumertype, invoice, invoicetype, product, producttypes};

function product()
{
    return product::all()->toArray();
}

function productcate()
{
    return producttypes::all()->toArray();
}

function costumers()
{
    return costumer::all()->toArray();
}

function typecostumers()
{
    return costumertype::all()->toArray();
}

function invoices()
{
    return invoice::all()->toArray();
}

function typeinvoices()
{
    return invoicetype::all()->toArray();
}
function clientViseInvoices()
{
    return product::all()->toArray();
}

function service()
{
    return product::all()->toArray();
}

function offers()
{
    return product::all()->toArray();
}

function clientOffers()
{
    return product::all()->toArray();
}
?>
