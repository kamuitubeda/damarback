<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Billing;
use App\Models\StudentClass;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json(['students' => $students]);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json(['student' => $student]);
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return response()->json(['student' => $student], 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return response()->json(['student' => $student]);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(null, 204);
    }

    //extended function
    public function listStudentsInClass($classId)
    {
        $studentsInClass = StudentClass::with('student')
            ->where('class_id', $classId)
            ->get()
            ->pluck('student');

        return response()->json(['students_in_class' => $studentsInClass]);
    }

    public function listStudentsWithNoUnpaidBills()
    {
        $studentsWithNoUnpaidBills = Student::whereDoesntHave('billings', function ($query) {
            $query->where('payment_status', 'unpaid');
        })->get();

        return response()->json(['students_with_no_unpaid_bills' => $studentsWithNoUnpaidBills]);
    }

    public function listStudentBillingsInClass($studentId, $classId)
    {
        $student = Student::find($studentId);

        if (!$student) {
            return response()->json(['error' => 'Student not found.'], 404);
        }

        $classBillings = Billing::where('student_id', $studentId)
            ->whereHas('payment.studentClasses', function ($query) use ($classId) {
                $query->where('class_id', $classId);
            })
            ->get();

        return response()->json(['class_billings' => $classBillings]);
    }
}
