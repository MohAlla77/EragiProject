<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;
    
    protected $table = 'employees' ;

    protected $fillable = [
    'email',
    'name',
    'phone_number',
    'salary',
    'department',
    'direct_day',
    'address',
    'workplace',
    'marital_status',
    'nationality',
    'image',
    ];
}
