<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEmployeeRequest;
use App\Models\employees;


class EmployeesController extends Controller
{   
    public function store(AddEmployeeRequest $request) 
    {

        dd(request()->all());

        $valideted = $request->validate();


        employees::created([

            'email' =>         $valideted['e-Email'],
            'name'  =>         $valideted['name'] ,
            'phone_number' =>  $valideted['phone_number'] ,
            'salary' =>        $valideted['salary'] ,
            'department' =>    $valideted['department'] ,
            'direct_day' =>    $valideted['direct_day'],
            'address' =>       $valideted['address'],
            'workplace' =>     $valideted['workplace'] ,
            'marital_status' =>$valideted['marital_status'] ,
            'nationality' =>   $valideted['nationality'] ,
           
        ]);

        return view('home');
    }
    
    // public function search(requset $request){
    //     $name =$request->get('name');

    //     $employees=Employees::where('name',$name)->first();

    //     if (!$name) {
    //         return view('employees',['name' => null, 'error' =>'employees not  found']);
    //     }
    //     $checknameData = DB::table('check_name')    
    

    
    //     $employees = employees::all();

    //     return view('/Management.employees', ['Management.employees' => $employees]);
    // }
}
