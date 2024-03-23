<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Spare;

class SpearController extends Controller
{
    public function search(Request $request)
    {
        $Part_id = $request->get('PartId');

        $items = Item::paginate(4);

        //dd($request->all());


        $spear = Spare::where('part_id',$Part_id)->first();


        $request->session()->put('spear', $spear);
        $request->session()->put('items', $items);

        $car = $request->session()->get('car');

        $invoicNum = $request->session()->get('invoiceNum');



        if (!$spear) {

            $service = Service::where('service_id', $Part_id)
            ->where('status', 'Approved')
            ->first();
            return view('Invoice', ['service' => $service , 'car' => $car , 'invoiceNum' => $invoicNum , 'items' => $items]);

        } elseif($spear){

            return view('Invoice', ['spear' => $spear , 'car' => $car , 'invoiceNum' => $invoicNum , 'items' => $items]);

        }

        return view('Invoice');


    }

    public function StoreSpear(Spare $id)
    {

        $item = Item::create([

            'name' => $id->name,
            'code' => $id->part_id,
            'unit' => request()->get('ItemUnit'),
            'quantity' => request()->get('ItemQuantity'),
            'price' => $id->price,

        ]);
        return redirect()->back();

    }
    public function StoreService(Service $id)
    {

        $item = Item::create([

            'name' => $id->name,
            'code' => $id->service_id,
            'unit' => request()->get('ItemUnit'),
            'quantity' => 1,
            'price' => $id->cost_price,

        ]);
        return redirect()->back();

    }
}
