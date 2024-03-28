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
            return view('Home_pages.view_maintenace_detaails', ['Cars' => $cars]);
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
            'Worker_name' => request()->get('WorkerName')
        ]);

        $car->status = 'DONE';
        $car->save();

        DB::table('check_car')->where('car_id', $car->id)->delete();

        return redirect()->back();



    }
}
