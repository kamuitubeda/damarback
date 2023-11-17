<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAttendance;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        $studentAttendances = StudentAttendance::all();
        return response()->json(['studentAttendances' => $studentAttendances]);
    }

    public function show($id)
    {
        $studentAttendance = StudentAttendance::findOrFail($id);
        return response()->json(['studentAttendance' => $studentAttendance]);
    }

    public function store(Request $request)
    {
        $studentAttendance = StudentAttendance::create($request->all());
        return response()->json(['studentAttendance' => $studentAttendance], 201);
    }

    public function update(Request $request, $id)
    {
        $studentAttendance = StudentAttendance::findOrFail($id);
        $studentAttendance->update($request->all());
        return response()->json(['studentAttendance' => $studentAttendance]);
    }

    public function destroy($id)
    {
        $studentAttendance = StudentAttendance::findOrFail($id);
        $studentAttendance->delete();
        return response()->json(null, 204);
    }

    public function listStudentAttendance(Request $request, $studentId)
    {
        $studentAttendance = StudentAttendance::where('student_id', $studentId)->get();

        return response()->json(['student_attendance' => $studentAttendance]);
    }
}
