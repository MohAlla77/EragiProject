<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name','supplierId','commercial_register_number','commercial_register_number',
'national_address','tax_number','phone','postcode','account_number'];
}
