<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseEntryRequirement;
use Illuminate\Http\Request;

class CourseEntryRequirementController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'requirement' => 'required|string|max:1000',
        ]);
    
        $requirement = CourseEntryRequirement::create($validated);
    
        return response()->json(['success' => true, 'data' => $requirement]);
    }
    
    public function update(Request $request, CourseEntryRequirement $requirement)
    {
        $validated = $request->validate([
            'requirement' => 'required|string|max:1000',
        ]);
    
        $requirement->update($validated);
    
        return response()->json(['success' => true, 'data' => $requirement]);
    }
    
    public function destroy(CourseEntryRequirement $requirement)
    {
        $requirement->delete();
    
        return response()->json(['success' => true]);
    }
    
}
