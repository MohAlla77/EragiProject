<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTireRequest;
use App\Models\Tires;
use Illuminate\Http\Request;

class TiresController extends Controller
{
    public function index()
    {
        return view('Tires');
    }

    public function AddTire()
    {




        Tires::create([

            'tire_serial' => request()->get('Tire_serial'),
            'size' => request()->get('TireSize'),
            'amount' => request()->get('TireAmount'),
            'price' => request()->get('TirePrice'),
            'country_of_construction' => request()->get('TireCountry'),
            'model' => request()->get('TireModel'),
            'quantity_available' => request()->get('TireAmount'),
            'production_date' => request()->get('TireDate')

        ]);

        return view('home');
    }
}
