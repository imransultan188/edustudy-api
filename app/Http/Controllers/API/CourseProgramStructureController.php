<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseProgramStructure;

class CourseProgramStructureController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'year' => 'required|integer|min:1|max:6',
            'description' => 'required|string',
        ]);

        $structure = CourseProgramStructure::create($validated);

        return response()->json([
            'success' => true,
            'data' => $structure,
        ]);
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'year' => 'required|integer|min:1|max:6',
        'description' => 'required|string',
    ]);

    $structure = CourseProgramStructure::findOrFail($id);
    $structure->update($validated);

    return response()->json([
        'success' => true,
        'data' => $structure,
    ]);
}


    public function destroy($id)
    {
        $structure = CourseProgramStructure::findOrFail($id);
        $structure->delete();

        return response()->json(['success' => true]);
    }
}
