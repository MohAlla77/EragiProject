<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['user_id', 'name', 'phone', 'plate', 'counter', 'car_name', 'service', 'model', 'brand', 'comment', 'status', 'structure_no'];

    public function AddToCheck()
    {
        return $this->belongsToMany(User::class, 'check_car')
            ->withPivot('customer_comment')
            ->withTimestamps();
    }
    // In your Car model
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('customer_comment');
    }
}
