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
        'amount' => 'required|numeric|min:0',
    ]);

    $fee = CourseYearlyFee::create($validated);

    return response()->json([
        'success' => true,
        'data' => $fee,
    ], 201);
}
}
