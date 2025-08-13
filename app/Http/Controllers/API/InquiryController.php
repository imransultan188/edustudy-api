<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{

    public function index()
    {
        $inquiries = Inquiry::orderBy('created_at', 'desc')->get();
    
        return response()->json([
            'message' => 'Inquiry fetched successfully',
            'data' => $inquiries
        ], 200); // use 200 for successful fetch
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'       => 'required|string|max:255',
            'phone_whatsapp'  => 'required|string|max:50',
            'email'           => 'nullable|email|max:255',
            'nationality'     => 'nullable|string|max:100',
            'program_level'   => 'nullable|string|max:100',
            'background'      => 'nullable|string',
        ]);

        $inquiry = Inquiry::create($validated);

        return response()->json([
            'message' => 'Inquiry submitted successfully',
            'data' => $inquiry
        ], 201);
    }
}
