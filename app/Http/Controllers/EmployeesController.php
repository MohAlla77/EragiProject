<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEmployeeRequest;
use App\Models\employees;


class EmployeesController extends Controller
{
    public function index()
    {

        $employees = Employees::all();

        return view('Employees', ['Employees' => $employees]);
    }

    public function Employeesstore(AddEmployeeRequest $request)
    {

        dd(request()->all());

        $valideted = $request->validate();


        employees::created([

            'email' =>           $valideted['e-Email'],
            'name'  =>           $valideted['name'] ,
            'employee_number' => $valideted['employee_number'] ,
            'identity_number'=>  $valideted['identity_number'],
            'phone_number' =>    $valideted['phone_number'] ,
            'department' =>      $valideted['department'] ,
            'direct_manager'=>   $valideted['direct_manager'],
            'basic_salary' =>    $valideted['basic_salary'] ,
            'housing_allowance'=>$valideted['housing_allowance'],
            'other_allowances'=> $valideted['other_allowances'],
            'address' =>         $valideted['address'],
            'marital_status' =>  $valideted['marital_status'] ,
            'nationality' =>     $valideted['nationality'] ,
            'direct_day' =>      $valideted['direct_day'],
            'workplace' =>       $valideted['workplace'] ,
            'birth_date' =>      $valideted['birth_date'],
        ]);

        return view('home');
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     if ($query) {
    //         $employees = employees::where('name', 'LIKE', "%{$query}%")
    //             ->orWhere('job_number', 'LIKE', "%{$query}%")
    //             ->get();
    //     } else {
    //         $employees = collect(); 
    //     }

    //     return view('search', compact('employees', 'query'));
    // }
    
}
