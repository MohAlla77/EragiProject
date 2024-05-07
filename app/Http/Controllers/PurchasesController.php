<?php

namespace App\Http\Controllers;

use App\Models\Categorize;
use App\Models\CategorizeGroup;
use App\Models\Service;
use App\Models\ServiceGroup;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index()
    {

        // ServiceGroup::truncate();
        // Service::truncate();


        $Service_group = ServiceGroup::all();
        $suppler = Supplier::all();
        $service = Service::take(5)->get(   );

        $Categorize_group = CategorizeGroup::all();
        $categorizes = Categorize::all();



        return view('Purchases', ['ServiceGroup' => $Service_group,
         'CategorizeGroup' => $Categorize_group , 'Services' => $service , 'categorizes' => $categorizes , 'Supplers' => $suppler]);
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
            'seal_price' => request()->get('ServiceCost'),
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

    public function UpdateService(Service $id)
    {
        // Retrieve the group ID based on the provided service group number
        $group = ServiceGroup::where('number', request()->get('service_group_id'))->firstOrFail();
        $group_id = $group->GroupID;

        // Calculate the service ID based on group information and count of services
        $groupNumber = $group->number;
        $serialNumber = $group->services()->count() + 1;
        $serviceId = sprintf('%s-%03d-%03d', $group_id, $groupNumber, $serialNumber);

        // Update the service with the provided data
        $id->service_group_id = request()->get('service_group_id');
        $id->name = request()->get('ServiceName');
        $id->service_type = request()->get('ServiceType');
        $id->cost_price = request()->get('ServiceCost');
        $id->service_id = $serviceId;
        $id->save();

        // Redirect or return a response
        return redirect()->back();
    }


}
