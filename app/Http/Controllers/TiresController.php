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

    public function AddTire()
    {
        //$validated = $request->validated();


        Tires::create([

            'tire_serial' => request()->get('Tire_serial'),
            'size' => request()->get('TireSize'),
            'quantityl' => request()->get('quantity'),
            'amount' => request()->get('TireAmount'),
            'price' => request()->get('TirePrice'),
            'country_of_construction' => request()->get('TireCountry'),
            'model' => request()->get('TireModel'),
            'quantity_available' => request()->get('TireAmount'),
            'production_date' => request()->get('TireDate'),
            'purchase_invoice'=> request()->get('purchase_invoice'),
            'tax_number'=> request()->get('tax_number'),
            'supplier'=> request()->get('supplier'),
            'store_Place'=> request()->get('store_Place'),
            'selling_price'=> request()->get('selling_price'),

        ]);

        $tires = Tires::all();

        return view("Tires", ['Tires' => $tires]);
    }
}
