<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\University;

class UniversityController extends Controller
{
    // List all universities
    public function index()
    {
        return response()->json(University::with('country')->get());
    }

    // Add a new university
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'city' => 'nullable|string',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
            'logo' => 'nullable|string',
        ]);

        $university = University::create($request->all());

        return response()->json([
            'message' => 'University created successfully',
            'data' => $university
        ]);
    }

    // Get single university
    public function show($id)
    {
        $university = University::with('country')->findOrFail($id);
        return response()->json($university);
    }

    // Update a university
    public function update(Request $request, $id)
    {
        $university = University::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string',
            'country_id' => 'sometimes|exists:countries,id',
            'city' => 'nullable|string',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
            'logo' => 'nullable|string',
        ]);

        $university->update($request->all());

        return response()->json([
            'message' => 'University updated successfully',
            'data' => $university
        ]);
    }

    // Delete a university
    public function destroy($id)
    {
        $university = University::findOrFail($id);
        $university->delete();

        return response()->json([
            'message' => 'University deleted successfully'
        ]);
    }

}
