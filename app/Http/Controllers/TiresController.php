<?php

namespace App\Http\Controllers;


use App\Http\Requests\AddTiresRequest;
use App\Models\Tires;
use Illuminate\Http\Request;

class TiresController extends Controller
{
    public function index()
    {

        $tires = Tires::all();

        return view('Tires', ['Tires' => $tires]);
    }

    public function AddTire(AddTiresRequest $request)
    {
        //$validated = $request->validated();


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

        $tires = Tires::all();

        return view("Tires", ['Tires' => $tires]);
    }
}
