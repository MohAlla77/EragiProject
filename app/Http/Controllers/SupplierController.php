<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {

        $supplier = Supplier::all();

        return view('Supplier', ['Supplier' => $supplier]);
    }


    public function SupplierStore()
    {



        Supplier::create([

            'name' => request()->get('SupplierName'),
            'supplierId' => request()->get('SupplierID'),
            'commercial_register_number' => request()->get('SupplierRigesteNumber'),
            'phone' => request()->get('u_phone'),
            'national_address' =>  request()->get('SupplierNationalNumber'),
            'tax_number' =>  request()->get('SupplierTaxNumber'),
            'postcode' =>   request()->get('PostCode'),
            'account_number' =>   request()->get('AccountNumber'),
        ]);

        return redirect()->route('Supplier');
    }
}
