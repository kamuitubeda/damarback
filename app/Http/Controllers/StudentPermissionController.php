<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentPermission;

class StudentPermissionController extends Controller
{
    public function index()
    {
        $studentPermissions = StudentPermission::all();
        return response()->json(['studentPermissions' => $studentPermissions]);
    }

    public function show($id)
    {
        $studentPermission = StudentPermission::findOrFail($id);
        return response()->json(['studentPermission' => $studentPermission]);
    }

    public function store(Request $request)
    {
        $studentPermission = StudentPermission::create($request->all());
        return response()->json(['studentPermission' => $studentPermission], 201);
    }

    public function update(Request $request, $id)
    {
        $studentPermission = StudentPermission::findOrFail($id);
        $studentPermission->update($request->all());
        return response()->json(['studentPermission' => $studentPermission]);
    }

    public function destroy($id)
    {
        $studentPermission = StudentPermission::findOrFail($id);
        $studentPermission->delete();
        return response()->json(null, 204);
    }

    public function requestPermission(Request $request, $studentId)
    {
        $request->validate([
            'permission_type' => 'required|in:home_leave,other_permission',
            'reason' => 'required|string',
        ]);

        StudentPermission::create([
            'student_id' => $studentId,
            'permission_type' => $request->permission_type,
            'reason' => $request->reason,
            'status' => 'pending',
            // Add other fields as needed
        ]);

        return response()->json(['message' => 'Permission requested successfully.']);
    }
}
