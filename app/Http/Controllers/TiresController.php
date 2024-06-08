<?php

namespace App\Http\Controllers;


use App\Http\Requests\AddTiresRequest;
use App\Models\Supplier;
use App\Models\Tires;
use Illuminate\Http\Request;

class TiresController extends Controller
{
    public function index()
    {

        $tires = Tires::all();
        $suppler = Supplier::all();

        return view('Tires', ['Tires' => $tires, 'Supplers' => $suppler]);
    }

    public function AddTire(AddTiresRequest $request)
    {
        $validated = $request->validated();

        Tires::create([

            'tire_serial' => request()->input('Tire_serial'),
            'size' => request()->input('Size'),
            'quantityl' => request()->input('quantity'),
            'amount' => request()->input('amount'),
            'price' => request()->input('price'),
            'country_of_construction' => request()->input('country_of_construction'),
            'model' => request()->input('model'),
            'quantity_available' => request()->input('quantity_available'),
            'production_date' => request()->input('production_date'),
            'purchase_invoice'=> request()->input('purchase_invoice'),
            'tax_number'=> request()->input('tax_number'),
            'supplier'=> request()->input('supplier'),
            'store_Place'=> request()->input('store_Place'),
            // 'selling_price'=> request()->input('selling_price'),

        ]);

        $tires = Tires::all();

        return view("Tires", ['Tires' => $tires]);
    }
}
