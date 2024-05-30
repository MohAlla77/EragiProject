<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorize extends Model
{
    use HasFactory;

    protected $fillable = 
    ['name',
     'serial_number',
     'GroupID',
     'store_place',
     'SupplierName',
     'SupplierTaxNumber',
     'InvoiceDatePurchase',
     'amount',
     'price_cost',
     'unit_type',
    //  'seal_cost'
    ];

}
