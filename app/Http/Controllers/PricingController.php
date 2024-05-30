<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index(){
        // $pricing = Pricing::all();
         return view('Pricing'
        //  ,['Pricing' => $pricing]
        );
    }
}
