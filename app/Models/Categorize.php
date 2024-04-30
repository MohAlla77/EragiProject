<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorize extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'serial_number','amount_type','amount_price','seal_cost','unit_price','unit_type',
    'unit','amount','price_cost','GroupID'];

}
