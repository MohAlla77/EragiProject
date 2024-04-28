<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarHistory;
use App\Models\Item;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as pdf;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $item = Item::truncate();

        $PendingServices = Service::where('status','Pending')->get();

       // dd(request()->session()->all());





        request()->session()->forget(['spear', 'car', 'invoiceNum']);



        return view('Invoice' , ['item' => $item , 'PendingServices' => $PendingServices]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function GeneratePdf(){

        $car = request()->session()->get('car');
        $invoicNum = request()->session()->get('invoiceNum');
        $items = request()->session()->get('items');

       //dd(request()->session()->all());


        //dd(session()->all());
        $currentDateTime = Carbon::now();
        $Date = $currentDateTime->format('d/m/y');

        $data = [
            'car' => $car ,
            'invoicNum' => $invoicNum ,
            'items' => $items ,
            'Date' => $Date
        ];

        $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->stream('invoice.pdf');

    }

}
