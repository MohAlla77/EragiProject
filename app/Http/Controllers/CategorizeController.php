<?php

namespace App\Http\Controllers;

use App\Models\Categorize;
use App\Models\CategorizeGroup;
use Illuminate\Http\Request;

class CategorizeController extends Controller
{
    public function StoreGroup()
    {
        CategorizeGroup::create([
            'name' => request()->get('CategorizeGroupName'),
            'number' => request()->get('CategorizeGroupNumber'),

        ]);

        return redirect()->route('purchases');
    }

    public function store()
    {
        Categorize::create([


            'GroupID' => request()->get('categorize_group_id'),
            'name' => request()->get('CategorizeName'),
            'store_place' => request()->get('StorgePlace'),
            'SupplierName' => request()->get('SupplierName'),
            'serial_number' => request()->get('CategorizeSerial'),
            'SupplierTaxNumber' => request()->get('SupplierTaxNumber'),
            'InvoiceDatePurchase' => request()->get('InvoiceDatePurchase'),
            'unit_type' => request()->get('UnitType'),
            'amount' => request()->get('CategorizeAmount'),
            'price_cost' =>  request()->get('price_cost'),
            'seal_cost' => request()->get('CategorizeSealCost'),





        ]);

        return redirect()->route('purchases');
    }
}
