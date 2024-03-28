<?php

namespace App\Http\Controllers;

use App\Models\ServiceGroup;
use Illuminate\Http\Request;

class ServiceGroupController extends Controller
{
    public function store(){

        ServiceGroup::create([
          'name' => request()->get('GroupName'),
          'number' => request()->get('GroupNumber'),
          'GroupID' => request()->get('GroupID')
        ]);

        return redirect()->route('purchases');
    }
}
