<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Http\Resources\TeacherResource;
use App\Http\Controllers\BaseController as BaseController;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return $this->sendResponse(TeacherResource::collection($teachers), 'Teachers retrieved successfully.');
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);

        if (is_null($teacher)) {
            return $this->sendError('Teacher not found.');
        }

        return $this->sendResponse(new TeacherResource($teacher), 'Teacher retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $teacher = Teacher::create($request->all());

        return $this->sendResponse(new  TeacherResource($teacher), 'Teacher created successfully.');
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $teacher->update($request->all());
   
        return $this->sendResponse(new TeacherResource($teacher), 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return $this->sendResponse([], 'Teacher deleted successfully.');
    }
}
