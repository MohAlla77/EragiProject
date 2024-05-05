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
            'storeplace' => request()->get('storeplace'),
            'SupplierName' => request()->get('SupplierName'),
            'serial_number' => request()->get('CategorizeSerial'),
            'SupplierTaxNumber' => request()->get('SupplierTaxNumber'),
            'InvoiceDatePurchase' => request()->get('InvoiceDatePurchase'),
            'unittype' => request()->get('UnitType'),
            'amount' => request()->get('CategorizeAmount'),
            'price_cost' => request()->get('CategorizeCost'),
            'seal_cost' => request()->get('CategorizeSealCost'),
            
            // 'unit' => request()->get('CategorizeUnit'),
            // 'amount_type' => request()->get('AmountType'),
            // 'amount_price' => request()->get('AmountPrice'),
            // 'unit_price' => request()->get('UnitPrice'),



        ]);

        return redirect()->route('purchases');
    }
}
