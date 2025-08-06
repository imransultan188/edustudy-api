<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    
    public function index ()
    {
        $courses = Course::all();

    return response()->json([
        'message' => 'courses fetched successfully',
        'data' => $courses
    ], 200);
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'university_id' => 'required|integer',
        'level_id' => 'required|integer',
        'name' => 'required|string|max:255',
       'slug' => Str::slug($request->name),
        'overview' => 'nullable|string',
        'duration' => 'nullable|string',
        'class_type' => 'nullable|string',
        'total_fees' => 'nullable|numeric',
        'currency' => 'nullable|string|max:10',
        'english_requirement' => 'nullable|string',
        'offer_letter_free' => 'nullable|boolean',
        'credit_hours' => 'nullable|integer',
        'intakes' => 'nullable|array',
    ]);

    // Convert 'intakes' array to JSON
    $validated['intakes'] = json_encode($validated['intakes']);

    $program = Course::create($validated);

    return response()->json([
        'message' => 'Program created successfully',
        'data' => $program
    ], 201);
}



public function destroy($id)
{
    $course = Course::find($id);

    if (!$course) {
        return response()->json([
            'message' => 'course not found'
        ], 404);
    }

    $course->delete();

    return response()->json([
        'message' => 'course deleted successfully'
    ], 200);
}

}
