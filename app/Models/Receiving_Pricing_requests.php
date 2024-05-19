<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivingPricingRequest extends Model
{
    use HasFactory;

    // Fillable properties
    protected $fillable = [
        'cost_price',
        'quantity',
        'unit_type',
        'serial_number',
        'item_name',
    ];
}
