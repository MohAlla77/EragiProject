<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceGroup;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index()
    {

        $qroup = ServiceGroup::all();
        $service = Service::all();



        return view('Purchases', ['ServiceGruop' => $qroup , 'Services' => $service]);
    }

    public function SealsIndex(){


        $service = Service::all();

        return view('Seals', ['Services' => $service]);


    }

    public function ServiceStore()
    {


        $group = ServiceGroup::where('number', request()->get('service_group_id'))->firstOrFail();
        $groupNumber = $group->number;
        $serialNumber = $group->services()->count() + 1;
        $serviceId = sprintf('XXX-%03d-%03d', $groupNumber, $serialNumber);


        Service::create([
            'service_group_id' => request()->get('service_group_id'),
            'name' => request()->get('ServiceName'),
            'service_type' => request()->get('ServiceType'),
            'cost_price' => request()->get('ServiceCost'),
            'service_id' => $serviceId,
            'status' => 'Pending',
        ]);

        return redirect()->route('purchases');
    }

    public function Approve(Service $id){

        $id->status = 'Approved';
        $id->save();

        return redirect()->back();

    }
}
