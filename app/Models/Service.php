<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

 protected $fillable = ['name', 'cost_price' , 'service_id','service_type' , 'service_group_id','status'];

    public function serviceGroup()
    {
        return $this->belongsTo(ServiceGroup::class);
    }
}
