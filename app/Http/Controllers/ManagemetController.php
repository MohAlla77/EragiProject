<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class ManagemetController extends Controller
{
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
