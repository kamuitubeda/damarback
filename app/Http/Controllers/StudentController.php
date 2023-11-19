<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Student;
use App\Models\Models\Billing;
use App\Models\Models\StudentClass;
use App\Http\Resources\StudentResource;
use App\Http\Controllers\BaseController as BaseController;

class StudentController extends BaseController
{
    public function index()
    {
        $students = Student::all();
        return $this->sendResponse(StudentResource::collection($students), 'Students retrieved successfully.');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        if (is_null($student)) {
            return $this->sendError('Student not found.');
        }

        return $this->sendResponse(new StudentResource($student), 'Student retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $student = Student::create($request->all());

        return $this->sendResponse(new  StudentResource($student), 'Student created successfully.');
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $student->update($request->all());
   
        return $this->sendResponse(new StudentResource($student), 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return $this->sendResponse([], 'Student deleted successfully.');
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
