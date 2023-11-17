<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function index()
    {
        $studentClasses = StudentClass::all();
        return response()->json(['studentClasses' => $studentClasses]);
    }

    public function show($id)
    {
        $studentClass = StudentClass::findOrFail($id);
        return response()->json(['studentClass' => $studentClass]);
    }

    public function store(Request $request)
    {
        $studentClass = StudentClass::create($request->all());
        return response()->json(['studentClass' => $studentClass], 201);
    }

    public function update(Request $request, $id)
    {
        $studentClass = StudentClass::findOrFail($id);
        $studentClass->update($request->all());
        return response()->json(['studentClass' => $studentClass]);
    }

    public function destroy($id)
    {
        $studentClass = StudentClass::findOrFail($id);
        $studentClass->delete();
        return response()->json(null, 204);
    }

    public function changeStudentClass(Request $request, $studentId)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
        ]);

        $studentClass = StudentClass::where('student_id', $studentId)->first();
        $studentClass->update(['class_id' => $request->class_id]);

        return response()->json(['message' => 'Student class updated successfully.']);
    }
}
