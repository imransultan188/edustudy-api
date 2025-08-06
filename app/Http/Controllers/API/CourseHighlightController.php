<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseHighLight;
use Illuminate\Http\Request;

class CourseHighlightController extends Controller
{

        public function store(Request $request)
        {
            $validated = $request->validate([
                'course_id' => 'required|exists:courses,id',
                'key' => 'required|string|max:255',
                'value' => 'required|string|max:255',
            ]);
    
            $highlight = CourseHighLight::create($validated);
    
            return response()->json(['success' => true, 'data' => $highlight]);
        }
    
        public function update(Request $request, CourseHighLight $highlight)
        {
            $validated = $request->validate([
                'key' => 'required|string|max:255',
                'value' => 'required|string|max:255',
            ]);
    
            $highlight->update($validated);
    
            return response()->json(['success' => true, 'data' => $highlight]);
        }
    
        public function destroy(CourseHighLight $highlight)
        {
            $highlight->delete();
    
            return response()->json(['success' => true]);
        }
    
}
