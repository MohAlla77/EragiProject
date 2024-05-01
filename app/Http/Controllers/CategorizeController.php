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
            'serial_number' => request()->get('CategorizeSerial'),
            'unit' => request()->get('CategorizeUnit'),
            'amount' => request()->get('CategorizeAmount'),
            'price_cost' => request()->get('CategorizeCost'),
            'amount_type' => request()->get('AmountType'),
            'amount_price' => request()->get('AmountPrice'),
            'seal_cost' => request()->get('CategorizeSealCost'),
            'unit_price' => request()->get('UnitPrice'),
            'unit_type' => request()->get('UnitType'),



        ]);

        return redirect()->route('purchases');
    }
}
