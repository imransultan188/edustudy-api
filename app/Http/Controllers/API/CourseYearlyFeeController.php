<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseYearlyFee;
use Illuminate\Http\Request;

class CourseYearlyFeeController extends Controller
{
    
public function store(Request $request)
{
    $validated = $request->validate([
        'course_id' => 'required|exists:courses,id',
        'year' => 'required|integer|min:1',
        'amount' => 'required|integer|min:0',
    ]);

    $fee = CourseYearlyFee::create($validated);

    return response()->json([
        'success' => true,
        'data' => $fee,
    ], 201);
}
public function update(Request $request, CourseYearlyFee $fee)
{
    $validated = $request->validate([
        'year' => 'required|integer|min:1|max:4',
        'amount' => 'required|integer|min:0',
    ]);

    try {
        $fee->update($validated);
        return response()->json(['success' => true, 'data' => $fee]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage()
        ], 500);
    }
}

public function destroy( CourseYearlyFee $fee)
{
    $fee->delete();
    return response()->json(['success' => true]);
}


}
