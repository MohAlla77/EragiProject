<?php

namespace App\Http\Controllers;

use App\Models\Categorize;
use App\Models\CategorizeGroup;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CategorizeController extends Controller
{
    public function index()
    {
        $categorizeGroup = CategorizeGroup::all();
        $categorizes = Categorize::all();
        $suppler = Supplier::all();
        $storeplace = [
            'المنطقة الصناعية ينبع',
            'حي الياقوت',
            'المدينة المنورة',
        ];
        $units = [
            'كرتونة',
            'حبة',
            'جالون',
            'ليتر',
        ];
    
        // Uncomment and use $selectedCategorize if needed
    
        return view('Categorize', [
            'categorizes' => $categorizes,
            'CategorizeGroup' => $categorizeGroup,
            'suppler' => $suppler,
            'storeplace' => $storeplace,
            'units' =>$units
        ]);
    }    

    public function StoreGroup()
    {
        CategorizeGroup::create([
            'name' => request()->get('CategorizeGroupName'),
            'number' => request()->get('CategorizeGroupNumber'),

        ]);

        return redirect()->route('Categorize');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'CategorizeName' => 'required|max:100',
        //     'CategorizeSerial' => 'required',
        //     'categorize_group_id' => 'required',
        //     'StorgePlace' => 'required',
        //     'SupplierName' => 'required',
        //     'SupplierTaxNumber' => 'required',
        //     'InvoiceDatePurchase' => 'required',
        //     'Unit_Type' => 'required',
        //     'CategorizeAmount' => 'required',
        //     'price_cost' => 'required',
        // ]);
    
        Categorize::create([
            'name' => $request->input('CategorizeName'),
            'serial_number' => $request->input('CategorizeSerial'),
            'GroupID' => $request->input('categorize_group_id'),
            'store_place' => $request->input('StorgePlace'),
            'SupplierName' => $request->input('SupplierName'),
            'SupplierTaxNumber' => $request->input('SupplierTaxNumber'),
            'InvoiceDatePurchase' => $request->input('InvoiceDatePurchase'),
            'unit_type' => $request->input('Unit_Type'),
            'amount' => $request->input('CategorizeAmount'),
            'price_cost' => $request->input('price_cost'),
        ]);
    
        return redirect()->route('Categorize');
    }
    public function showPurchasePage()
    {
        return view('Purchases');
    }
    public function addCategorize(Request $request)
    {
        $selectedCategorize = $request->input('Categorize',[]);

        session(['selectedCategorize' => $selectedCategorize]);

        return redirect()->route('Add.Categorize.Purchases');
    }


    public function showAddCategorizePage()
    {
        // Retrieve selected products from the session
        $selectedCategorize = session('selectedCategorize', []);

        // Load any necessary data for the add items page
        return view('add-Categorize', compact('selectedPurchases'));
    }

    // public function showPricingPage(Request $request)
    // {
    //     // Retrieve items with added details from the request
    //     $items = $request->input('items', []);

    //     // Store the items with added details in the session
    //     session(['items' => $items]);

    //     // Redirect to the pricing page
    //     return redirect()->route('pricing.page');
    // }

    // public function store(Request $request)
    // {
    //     // Retrieve priced items from the request
    //     $pricedItems = $request->input('pricedItems', []);

    //     // Process and store the priced items in the database
    //     foreach ($pricedItems as $item) {
    //         // Save each item to the database
    //         // Example: Product::create($item);
    //     }

    //     // Redirect to a success page or wherever appropriate
    //     return redirect()->route('success.page')->with('success', 'Products have been stored successfully.');
    // }
}

