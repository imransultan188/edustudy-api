<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseAdditionalFee;
use Illuminate\Http\Request;

class CourseAdditionalFeeController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $fee = CourseAdditionalFee::create($validated);

        return response()->json(['success' => true, 'data' => $fee], 201);
    }

    public function update(Request $request, CourseAdditionalFee $fee)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $fee->update($validated);

        return response()->json(['success' => true, 'data' => $fee]);
    }

    public function destroy(CourseAdditionalFee $fee)
    {
        $fee->delete();

        return response()->json(['success' => true]);
    }

}
