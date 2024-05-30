<?php

namespace App\Http\Controllers;

use App\Models\Categorize;
use App\Models\CategorizeGroup;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CategorizeController extends Controller
{
    public function index(){

        $Categorize_group = CategorizeGroup::all();
        // $categorizes = Categorize::all();
        $suppler = Supplier::all();
        

        return view('Categorize', [ 'CategorizeGroup' => $Categorize_group , 'Supplers' => $suppler]);
    }

    public function StoreGroup()
    {
        CategorizeGroup::create([
            'name' => request()->get('CategorizeGroupName'),
            'number' => request()->get('CategorizeGroupNumber'),

        ]);

        return redirect()->route('Categorize');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'CategorizeName' => 'required|max:100',
        //     'CategorizeSerial' => 'required',
        //     'categorize_group_id' => 'required',
        //     'StorgePlace' => 'required',
        //     'SupplierName' => 'required',
        //     'SupplierTaxNumber' => 'required',
        //     'InvoiceDatePurchase' => 'required',
        //     'Unit_Type' => 'required',
        //     'CategorizeAmount' => 'required',
        //     'price_cost' => 'required',
        // ]);
    
        Categorize::create([
            'name' => $request->input('CategorizeName'),
            'serial_number' => $request->input('CategorizeSerial'),
            'GroupID' => $request->input('categorize_group_id'),
            'store_place' => $request->input('StorgePlace'),
            'SupplierName' => $request->input('SupplierName'),
            'SupplierTaxNumber' => $request->input('SupplierTaxNumber'),
            'InvoiceDatePurchase' => $request->input('InvoiceDatePurchase'),
            'unit_type' => $request->input('Unit_Type'),
            'amount' => $request->input('CategorizeAmount'),
            'price_cost' => $request->input('price_cost'),
        ]);
    
        return redirect()->route('Categorize');
    }
}
