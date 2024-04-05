<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCarRequest;
use App\Mail\AddCarMail;
use App\Models\Car;
use App\Models\CarHistory;
use App\Models\CompanyInfo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CarController extends Controller
{
    public function index()
    {
        $CarBrand = [
            'Toyota', 'Ford', 'Chevrolet', 'Honda', 'Nissan', 'Volkswagen', 'BMW', 'Mercedes-Benz',
            'Audi', 'Hyundai', 'Kia', 'Subaru', 'Tesla', 'Mazda', 'Lexus', 'Jeep', 'Volvo', 'Porsche',
            'Land Rover', 'Jaguar', 'Mitsubishi', 'Fiat', 'GMC', 'Buick', 'Chrysler', 'Dodge', 'Ram',
            'Acura', 'Infiniti', 'Cadillac', 'Lincoln', 'Alfa Romeo', 'Peugeot', 'Renault', 'Citroën',
            'Suzuki', 'Dacia', 'SEAT', 'Škoda', 'MG', 'SsangYong', 'Mahindra', 'Tata', 'Perodua',
            'Proton', 'Geely', 'BYD', 'Great Wall', 'Chery', 'Brilliance', 'Aston Martin', 'Bentley',
            'Rolls-Royce', 'McLaren', 'Lamborghini', 'Bugatti', 'Lotus', 'Pagani', 'Koenigsegg',
            'Spyker', 'Alpine', 'Maserati', 'Ferrari'
        ];
        $Car_Model = [
            'value1' => '2005',
            'value2' => '2010',
            'value3' => '2020',
        ];

        $Car_Service = [
            'value1' => 'صيانة عامه',
            'value2' => 'غيار زيت',
            'value3' => 'مراجعة ماكينة',
        ];

        $company = CompanyInfo::all();

        return view('new_car', [
            'car_brand' => $CarBrand,
            'car_model' => $Car_Model,
            'car_service' => $Car_Service,
            'company' => $company
        ]);
    }

    public function store(AddCarRequest $request)
    {
        $validated = $request->validated();

      Car::create([
            'user_id' => auth()->id(),
            'name' =>    $validated['u_name'],
            'phone' =>   $validated['u_phone'],
            'plate' =>   $validated['car_plate'],
            'counter' => $validated['car_counter'],
            'car_name' =>$validated['car_name'],
            'service' => $validated['car_service'],
            'model' =>   $validated['car_model'],
            'brand' =>   $validated['car_brand'],
            'comment' => $validated['comment'],
            'structure_no' => $validated['structure_no'],
            'status' => 'NEW',
        ]);

         $user = auth()->user();

        Mail::to($user->email)->send(new AddCarMail($user));

        return redirect()->route('home');
    }

    public function search(Request $request)
    {
        $PlateNumber = $request->get('plateNumber');

        $car = Car::where('plate', $PlateNumber)->first();

        // Check if the car is found
        if (!$car) {
            return view('WorkSpace', ['car' => null, 'error' => 'Car not found']);
        }
        $checkCarData = DB::table('check_car')
            ->join('users', 'check_car.eng_id', '=', 'users.id')
            ->select('check_car.customer_comment', 'check_car.fix_requirement', 'check_car.eng_id' , 'users.first_name as user_name')
            ->where('car_id', '=', $car->id)
            ->first();

        $car_history = CarHistory::where('car_id',$car->id)->latest('created_at')->first();

        $countByCarId = CarHistory::where('car_id', $car->id)->count();



        return view('WorkSpace', ['car' => $car, 'data' => $checkCarData,
        'CarHistory' => $car_history, 'success' => 'The Car Found', 'countByCarId' =>  $countByCarId]);
    }

    public function Add(Car $id)
    {
        $check = auth()->user();
        $check->AddToCheck()->attach($id, ['customer_comment' => Request()->get('notes')]);

        $id->update(['status' => 'WAITING']);

        return redirect()->route('home')->with('success', 'The car Add to check list to review by engineer soon');
    }

    public function Remove(Car $id , User $user)
    {
        // dd($id);
        // dd(request()->all());
        // $user = auth()->user();
       //dd(auth()->user());
        // $user->cars()->detach($id);

        $user->cars()->updateExistingPivot($id, ['fix_requirement' => request()->get('sparePartsRequest'), 'Eng_id' => auth()->id()]);

        return redirect()->route('page.check')->with('success', 'The car has been removed from the check list.');
    }

    public function AddMaintenance(Car $id){

        $user = auth()->user();
        $id->update(['status' => 'MAINTENACE']);
        // $user->cars()->detach($id);

        return redirect()->back();

    }
    public function AddDone(Car $id){


        $user = auth()->user();


        $id->update(['status' => 'DONE']);
        // $user->cars()->detach($id);



        return redirect()->back();

    }

   public function  CarPlateSearch(Request $request){

    $PlateNumber = $request->get('PlateRef');
    $car = Car::where('plate', $PlateNumber)->first();

    $request->session()->put('car', $car);

    $spear = $request->session()->get('spear');

    $currentDate = Carbon::now()->format      ('my');
    preg_match('/\d+/', $PlateNumber, $matches);
    $numericPart = isset($matches[0]) ? $matches[0] : '';
    $invoiceNum = 'SI' . $numericPart . $currentDate;
    $request->session()->put('invoiceNum', $invoiceNum);





    // Check if the car is found
    if (!$car) {
        return view('Invoice', ['car' => null, 'error' => 'Car not found']);

    }


    return view('Invoice', ['car' => $car, 'spear' => $spear , 'invoiceNum' => $invoiceNum]);

   }
}
