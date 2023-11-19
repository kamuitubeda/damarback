<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentPermission;
use App\Http\Resources\StudentPermissionResource;
use App\Http\Controllers\BaseController as BaseController;

class StudentPermissionController extends Controller
{
    public function index()
    {
        $studentPermissions = StudentPermission::all();
        return $this->sendResponse(StudentPermissionResource::collection($studentPermissions), 'StudentPermissions retrieved successfully.');
    }

    public function show($id)
    {
        $studentPermission = StudentPermission::findOrFail($id);

        if (is_null($studentPermission)) {
            return $this->sendError('Student permission not found.');
        }

        return $this->sendResponse(new StudentPermissionResource($studentPermission), 'Student permission retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $studentPermission = StudentPermission::create($request->all());

        return $this->sendResponse(new  StudentPermissionResource($studentPermission), 'Student permission created successfully.');
    }

    public function update(Request $request, $id)
    {
        $studentPermission = StudentPermission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $studentPermission->update($request->all());
   
        return $this->sendResponse(new StudentPermissionResource($studentPermission), 'Student permission updated successfully.');
    }

    public function destroy($id)
    {
        $studentPermission = StudentPermission::findOrFail($id);
        $studentPermission->delete();
        return $this->sendResponse([], 'Student permission deleted successfully.');
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

        return $this->sendResponse([], 'Permission requested successfully.');
    }
}
