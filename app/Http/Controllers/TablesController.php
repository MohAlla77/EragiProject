<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function index(){
        $tables = Tables::all();
        return view('Tables',['Tables' => $tables]);
    }
}
