<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolYear;

class SchoolYearController extends Controller
{
    public function index()
    {
        $schoolYears = SchoolYear::all();
        return response()->json(['schoolYears' => $schoolYears]);
    }

    public function show($id)
    {
        $schoolYear = SchoolYear::findOrFail($id);
        return response()->json(['schoolYear' => $schoolYear]);
    }

    public function store(Request $request)
    {
        $schoolYear = SchoolYear::create($request->all());
        return response()->json(['schoolYear' => $schoolYear], 201);
    }

    public function update(Request $request, $id)
    {
        $schoolYear = SchoolYear::findOrFail($id);
        $schoolYear->update($request->all());
        return response()->json(['schoolYear' => $schoolYear]);
    }

    public function destroy($id)
    {
        $schoolYear = SchoolYear::findOrFail($id);
        $schoolYear->delete();
        return response()->json(null, 204);
    }
}
