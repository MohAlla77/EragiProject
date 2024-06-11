<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(){
        $display = [
            'المشتريات',
            'الاصناف',
            'الاطارات',
            'الموردين',
            'العملاء',
            'الفواتير',
        ];
        // $reports = Reports::all();
        return view('Reports',
        // ['Reports' => $reports],
        ['display' => $display]
    );
    }
}
