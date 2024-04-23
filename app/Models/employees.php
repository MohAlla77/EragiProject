<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;
    
    protected $table = 'employees' ;

    protected $fillable = [
    'Email',
    'name',
    'phone',
    'salary',
    'Function',
    'date',
    'address',
    'Workplace',
    'marital_status',
    'Nationality',
    'image',
    ];
}
