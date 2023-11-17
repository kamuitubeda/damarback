<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return response()->json(['payments' => $payments]);
    }

    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json(['payment' => $payment]);
    }

    public function store(Request $request)
    {
        $payment = Payment::create($request->all());
        return response()->json(['payment' => $payment], 201);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        return response()->json(['payment' => $payment]);
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->json(null, 204);
    }

    public function listPaymentsForToday()
    {
        $todayPayments = Payment::whereDate('payment_date', now()->toDateString())->get();

        return response()->json(['today_payments' => $todayPayments]);
    }

    public function listPaymentsForSpecificDay(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $specificDayPayments = Payment::whereDate('payment_date', $request->date)->get();

        return response()->json(['specific_day_payments' => $specificDayPayments]);
    }
}
