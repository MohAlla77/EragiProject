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
    'employee_number',
    'identity_number',
    'phone_number',
    'department',
    'direct_manager',
    'baseic_salary',
    'housing_allowance',
    'other_allowances',
    'address',
    'marital_status',
    'nationality',
    'direct_day',
    'workplace',
    
    ];
}
