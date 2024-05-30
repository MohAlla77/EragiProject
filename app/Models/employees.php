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
    // 'employee_number',
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
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            $employee->employee_number = self::generateEmployeeNumber();
        });
    }

    private static function generateEmployeeNumber()
    {
        $latestEmployee = self::orderBy('created_at', 'desc')->first();
        if (!$latestEmployee) {
            return 'EMP0001';
        }

        $lastNumber = intval(substr($latestEmployee->employee_number, 3));
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        return 'EMP' . $newNumber;
    }

}
