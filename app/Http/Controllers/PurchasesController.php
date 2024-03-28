<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceGroup;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index()
    {

        // ServiceGroup::truncate();
        // Service::truncate();


        $qroup = ServiceGroup::all();
        $service = Service::all();



        return view('Purchases', ['ServiceGruop' => $qroup , 'Services' => $service]);
    }

    public function SealsIndex(){


        $service = Service::where('status','Pending')->get();

        return view('Seals', ['Services' => $service]);


    }

    public function ServiceStore()
    {

        $group_id = ServiceGroup::where('number', request()->get('service_group_id'))->value('GroupID');


        $group = ServiceGroup::where('number', request()->get('service_group_id'))->firstOrFail();
        $groupNumber = $group->number;
        $serialNumber = $group->services()->count() + 1;
        $serviceId = sprintf('%s-%03d-%03d', $group_id, $groupNumber, $serialNumber);


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
    public function DeleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        // Redirect or return a response
        return redirect()->route('purchases')->with('success', 'Service deleted successfully');
    }
}
