<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CompanyInfo;
class Data_EntryController extends Controller
{
    public function index()
    {
        // $data_entry = Data_Entry::all();

        return view('Data_Entry',
        //  ['Data_Entry' => $data_entry]
        );
    }

    public function CompanyStore()
    {
        CompanyInfo::create([


            'company_name' => request()->get('CompanyName'),
            'person_name' => request()->get('PersonName'),
            'card' => request()->get('CompanyCard'),
            'tax_number' => request()->get('TaxNumber'),
            'phone' => request()->get('CompanyPhone'),
            'pay_type' => request()->get('CompanyPayType'),
        ]);

        return redirect()->route('Data_Entry');
    }

}
