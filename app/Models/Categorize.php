<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorize extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'serial_number','unit','amount','price_cost','GroupID'];

}
