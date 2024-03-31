<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tires extends Model
{
    use HasFactory;

    protected $table = 'tires';

    protected $fillable = ['tire_serial','size','amount','price','country_of_construction','model','production_date','quantity_available'];
}
