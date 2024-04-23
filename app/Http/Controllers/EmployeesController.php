<?php

namespace App\Http\Controllers;

use App\Models\employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
        {
            $employees = employees::all();
    
            return view('/Management.employees', ['Management.employees' => $employees]);
        }
    
    public  function store(Request $request) 
    {
         $request->validated([
            'email'=>'required|Email',
            'name'=>'required|min:6|max:20',
            'phone_number'=>'nullable|regex:/^[0-9]+$/|digits:10',
            'salary' => 'required|numeric',
            'department' =>  'required|string',
            'direct_day' => 'required|date',
            'address'=>'required|string',
            'workplace' =>  'required|string',
            'Nationality' =>  'required|string',
            'image' =>  'mimes:jpg,png,jpeg|max:5048',
        ]);

        employees::created([
            'Email' => $request-> email,
            'name' => $request-> name,
            'phone_number' => $request-> phone,
            'salary' => $request-> salary,
            'department' => $request-> department,
            'direct_day' => $request-> date,
            'address' => $request-> address,
            'Workplace' => $request-> Workplace,
            'marital_status' => $request-> marital_status,
            'Nationality' => $request-> Nationality,
            'image' => $request-> image,
        ]);
        
        $employees = employees::all();

        return view("/management/employees", ['employees' => $employees]);
    }
}
