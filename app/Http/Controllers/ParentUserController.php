<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentUser;
use App\Http\Resources\ParentUserResource;
use App\Http\Resources\StudentResource;
use App\Http\Controllers\BaseController as BaseController;

class ParentUserController extends Controller
{
    public function index()
    {
        $parentUsers = ParentUser::all();
        return $this->sendResponse(ParentUserResource::collection($parentUsers), 'ParentUsers retrieved successfully.');
    }

    public function show($id)
    {
        $parentUser = ParentUser::findOrFail($id);

        if (is_null($parentUser)) {
            return $this->sendError('ParentUser not found.');
        }

        return $this->sendResponse(new ParentUserResource($parentUser), 'ParentUser retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $parentUser = ParentUser::create($request->all());

        return $this->sendResponse(new  ParentUserResource($parentUser), 'ParentUser created successfully.');
    }

    public function update(Request $request, $id)
    {
        $parentUser = ParentUser::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $parentUser->update($request->all());
   
        return $this->sendResponse(new ParentUserResource($parentUser), 'ParentUser updated successfully.');
    }

    public function destroy($id)
    {
        $parentUser = ParentUser::findOrFail($id);
        $parentUser->delete();
        return $this->sendResponse([], 'ParentUser deleted successfully.');
    }

    public function listChildren(Request $request)
    {
        $parentUser = auth()->user();
        $children = $parentUser->students;

        $childrenResource = StudentResource::collection($children);
        return $this->sendResponse($childrenResource, 'List of children retrieved successfully.');
    }
}
