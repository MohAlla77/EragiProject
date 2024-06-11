<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function purchases()
    {
        return view('purchases', ['page' => 'purchases']);
    }

    public function Tires()
    {
        return view('Tires', ['page' => 'Tires']);
    }

    // public function inventory()
    // {
    //     return view('inventory', ['page' => 'inventory']);
    // }

    public function Employees()
    {
        return view('Employees', ['page' => 'Employees']);
    }
}