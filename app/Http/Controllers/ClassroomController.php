<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Classroom;
use App\Http\Resources\ClassroomResource;
use App\Http\Controllers\BaseController as BaseController;

class ClassroomController extends BaseController
{
    public function index()
    {
        $classrooms = Classroom::all();
        return $this->sendResponse(ClassroomResource::collection($classrooms), 'Classrooms retrieved successfully.');
    }

    public function show($id)
    {
        $classroom = Classroom::findOrFail($id);

        if (is_null($classroom)) {
            return $this->sendError('Classroom not found.');
        }

        return $this->sendResponse(new ClassroomResource($classroom), 'Classroom retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $classroom = Classroom::create($request->all());

        return $this->sendResponse(new  ClassroomResource($classroom), 'Classroom created successfully.');
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $classroom->update($request->all());
   
        return $this->sendResponse(new ClassroomResource($classroom), 'Classroom updated successfully.');
    }

    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();
        return $this->sendResponse([], 'Classroom deleted successfully.');
    }
}
