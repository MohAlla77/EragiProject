<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $count_all = Car::count();
        $count_new = Car::where('status','NEW')->count();
        $count_main = Car::where('status','Maintenace')->count();
        $count_wait = Car::where('status','WAITING')->count();
        $count_done = Car::where('status','DONE')->count();


        return view('home', [

            'count_new' => $count_new,
            'count_all' => $count_all,
            'count_main' => $count_main,
            'count_wait' => $count_wait,
            'count_done' => $count_done,

        ]);
    }

    public function view($type)
    {




        if ($type === 'all') {
            $cars = Car::get();
            return view('Home_pages.view_all_details', ['Cars' => $cars]);
        } elseif ($type === 'done') {
            $cars = Car::where('status', 'DONE')->get();
            return view('Home_pages.view_all_details', ['Cars' => $cars]);
        } elseif ($type === 'Maintenace') {
            $cars = Car::where('status', 'MAINTENACE')->get();
            $data = DB::table('check_car')
            ->join('cars', 'check_car.car_id', 'cars.id')
            ->select('check_car.customer_comment' , 'check_car.fix_requirement')->get();
            return view('Home_pages.view_maintenace_detaails', ['Cars' => $cars , 'Data' => $data]);
        } else {
            $cars = Car::where('status', 'WAITING')->get();
            return view('Home_pages.view_Wait_details', ['Cars' => $cars]);
        }
    }

    public function CheckPage()
    {

        // dd(auth()->user());
        // Fetch data from the pivot table
        $checkCarData = DB::table('check_car')->join('users', 'check_car.user_id', '=', 'users.id')
        ->join('cars', 'check_car.car_id', '=', 'cars.id')
        ->select('users.first_name as user_name', 'cars.id as CarId', 'cars.name as u_name', 'cars.car_name as CarName','check_car.user_id as UserId',
         'check_car.customer_comment', 'check_car.fix_requirement', 'check_car.created_at')
         ->orderBy('check_car.created_at', 'desc')
         ->get();

        return view('Home_pages.view_check', ['checkCarData' => $checkCarData]);
    }

    public function ToDone(Car $car )
    {
        //Add to log
        //move to done
        //detach from check

        $maintenanceStartedAt = $car->updated_at ;
        $maintenanceEndedAt =  now();

        $maintenanceTime = $maintenanceEndedAt->diffForHumans($maintenanceStartedAt);

        $check = DB::table('check_car')
            ->where('car_id', $car->id)
            ->first();

        $user = User::class;


        CarHistory::create([
            'car_id' => $car->id,
            'user_name' => $car->user_id,
            'Eng_name'  => $check->eng_id,
            'fix'       => $check->customer_comment,
            'fix_doc'   => $check->fix_requirement,
            'Worker_name' => request()->get('WorkerName'),
            'Work_time' =>  $maintenanceTime,
            'wait_reason' => '',
            'status' => 'DONE'
        ]);


        $car->status = 'DONE';
        $car->save();

        DB::table('check_car')->where('car_id', $car->id)->delete();

        return redirect()->back();

    }

    public function ToWait(Car $car )
    {
        //Add to log
        //move to done
        //detach from check

        $maintenanceStartedAt = $car->updated_at ;
        $maintenanceEndedAt =  now();

        $maintenanceTime = $maintenanceEndedAt->diffForHumans($maintenanceStartedAt);

        $check = DB::table('check_car')
            ->where('car_id', $car->id)
            ->first();

        $user = User::class;



        CarHistory::create([
            'car_id' => $car->id,
            'user_name' => $car->user_id,
            'Eng_name'  => $check->eng_id,
            'fix'       => $check->customer_comment,
            'fix_doc'   => $check->fix_requirement,
            'Worker_name' => request()->get('WorkerName'),
            'Work_time' =>  $maintenanceTime,
            'status' => 'WAIT',
            'wait_reason' => request()->get('WaitReason'),
        ]);


        $car->status = 'WAITING';
        $car->save();

        DB::table('check_car')->where('car_id', $car->id)->delete();



        return redirect()->back();

    }
}
