<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookClosing;

class BookClosingController extends Controller
{
    public function index()
    {
        $bookClosings = BookClosing::all();
        return response()->json(['bookClosings' => $bookClosings]);
    }

    public function show($id)
    {
        $bookClosing = BookClosing::findOrFail($id);
        return response()->json(['bookClosing' => $bookClosing]);
    }

    public function store(Request $request)
    {
        $bookClosing = BookClosing::create($request->all());
        return response()->json(['bookClosing' => $bookClosing], 201);
    }

    public function update(Request $request, $id)
    {
        $bookClosing = BookClosing::findOrFail($id);
        $bookClosing->update($request->all());
        return response()->json(['bookClosing' => $bookClosing]);
    }

    public function destroy($id)
    {
        $bookClosing = BookClosing::findOrFail($id);
        $bookClosing->delete();
        return response()->json(null, 204);
    }
}
