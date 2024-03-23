<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGroup extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'number'];


    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
