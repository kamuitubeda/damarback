<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\StudentClass;

class BillingController extends Controller
{
    public function index()
    {
        $billings = Billing::all();
        return response()->json(['billings' => $billings]);
    }

    public function show($id)
    {
        $billing = Billing::findOrFail($id);
        return response()->json(['billing' => $billing]);
    }

    public function store(Request $request)
    {
        $billing = Billing::create($request->all());
        return response()->json(['billing' => $billing], 201);
    }

    public function update(Request $request, $id)
    {
        $billing = Billing::findOrFail($id);
        $billing->update($request->all());
        return response()->json(['billing' => $billing]);
    }

    public function destroy($id)
    {
        $billing = Billing::findOrFail($id);
        $billing->delete();
        return response()->json(null, 204);
    }

    //extended function

    public function listBillsForStudent($studentId)
    {
        $bills = Billing::where('student_id', $studentId)->get();

        return response()->json(['bills' => $bills]);
    }

    public function listStudentsInClassForBill($billId, $classId)
    {
        // Assuming you have a direct relationship between Billing and StudentClass
        $billing = Billing::with('student.studentClasses')->find($billId);

        if (!$billing) {
            return response()->json(['error' => 'Bill not found.'], 404);
        }

        $studentsInClass = $billing->student->studentClasses
            ->where('class_id', $classId)
            ->pluck('student');

        return response()->json(['students_in_class' => $studentsInClass]);
    }
}
