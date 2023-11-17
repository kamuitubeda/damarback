<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecurringBilling;

class RecurringBillingController extends Controller
{
    public function index()
    {
        $recurringBillings = RecurringBilling::all();
        return response()->json(['recurringBillings' => $recurringBillings]);
    }

    public function show($id)
    {
        $recurringBilling = RecurringBilling::findOrFail($id);
        return response()->json(['recurringBilling' => $recurringBilling]);
    }

    public function store(Request $request)
    {
        $recurringBilling = RecurringBilling::create($request->all());
        return response()->json(['recurringBilling' => $recurringBilling], 201);
    }

    public function update(Request $request, $id)
    {
        $recurringBilling = RecurringBilling::findOrFail($id);
        $recurringBilling->update($request->all());
        return response()->json(['recurringBilling' => $recurringBilling]);
    }

    public function destroy($id)
    {
        $recurringBilling = RecurringBilling::findOrFail($id);
        $recurringBilling->delete();
        return response()->json(null, 204);
    }

     public function addRecurringBilling(Request $request)
    {
        $request->validate([
            'billing_id' => 'required|exists:billings,id',
            'frequency' => 'required|in:monthly,half_yearly,yearly',
        ]);

        RecurringBilling::create([
            'billing_id' => $request->billing_id,
            'frequency' => $request->frequency,
            // Add other fields as needed
        ]);

        return response()->json(['message' => 'Recurring billing added successfully.']);
    }
}
