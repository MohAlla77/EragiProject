<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarHistory extends Model
{
    use HasFactory;

    protected $fillable = ['car_id','user_name','Eng_name','fix','fix_doc','Worker_name','Work_time'];
}
