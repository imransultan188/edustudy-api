<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseCareerOpportunity;
use Illuminate\Http\Request;

class CourseCareerOpportunityController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'course_id' => 'required|exists:courses,id',
        'title' => 'required|string|max:255',
    ]);

    $career = CourseCareerOpportunity::create($validated);

    return response()->json(['success' => true, 'data' => $career]);
}

public function update(Request $request, CourseCareerOpportunity $career)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $career->update($validated);

    return response()->json(['success' => true, 'data' => $career]);
}

public function destroy(CourseCareerOpportunity $career)
{
    $career->delete();

    return response()->json(['success' => true]);
}

}
