<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentUser;

class ParentUserController extends Controller
{
    public function index()
    {
        $parentUsers = ParentUser::all();
        return response()->json(['parentUsers' => $parentUsers]);
    }

    public function show($id)
    {
        $parentUser = ParentUser::findOrFail($id);
        return response()->json(['parentUser' => $parentUser]);
    }

    public function store(Request $request)
    {
        $parentUser = ParentUser::create($request->all());
        return response()->json(['parentUser' => $parentUser], 201);
    }

    public function update(Request $request, $id)
    {
        $parentUser = ParentUser::findOrFail($id);
        $parentUser->update($request->all());
        return response()->json(['parentUser' => $parentUser]);
    }

    public function destroy($id)
    {
        $parentUser = ParentUser::findOrFail($id);
        $parentUser->delete();
        return response()->json(null, 204);
    }
}
