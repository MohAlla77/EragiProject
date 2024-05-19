<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReceivingPricingRequest; // Correct model

class ReceivingPricingRequestsController extends Controller // Correct naming
{
    public function index()
    {
        // Fetch all pricing requests from the database using the correct model
        $receivingPricingRequests = ReceivingPricingRequest::all();

        // Return the view with the data
        return view('ReceivingPricingRequests', ['receivingPricingRequests' => $receivingPricingRequests]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'cost_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'unit_type' => 'required|string|max:100',
            'serial_number' => 'required|string|max:100',
            'item_name' => 'required|string|max:100',
        ]);

        // Create a new pricing request record in the database
        ReceivingPricingRequest::create($validatedData);

        // Redirect to the index route with a success message
        return redirect()->route('ReceivingPricingRequests.index')->with('success', 'Pricing request created successfully.');
    }
}
