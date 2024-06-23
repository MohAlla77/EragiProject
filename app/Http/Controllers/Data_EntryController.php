<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CompanyInfo;
class Data_EntryController extends Controller
{
    public function index()
    {
        // $data_entry = Data_Entry::all();

        $paymentMethod = ['شبكة','كاش','مقدم','اجل'];

        return view('Data_Entry',
        ['paymentMethod'=>$paymentMethod,

        //  'Data_Entry' => $data_entry
        ]
        );
    }

    public function CompanyStore()
    {
        CompanyInfo::create([


            'company_name' => request()->get('CompanyName'),
            'person_name' => request()->get('PersonName'),
            'commercial_registration' => request()->get('Companyregistration'),
            'tax_number' => request()->get('TaxNumber'),
            'phone' => request()->get('CompanyPhone'),
            'pay_type' => request()->get('CompanyPayType'),
        ]);

        return redirect()->route('Data_Entry');
    }

}
