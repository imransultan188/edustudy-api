<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
     // Get all levels
     public function index()
     {
         return response()->json(Level::all());
     }
 
     // Add new level
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|unique:levels,name'
         ]);
 
         $level = Level::create($request->all());
 
         return response()->json([
             'message' => 'Level created successfully',
             'data' => $level
         ]);
     }
 
     // Update level
     public function update(Request $request, $id)
     {
         $level = Level::findOrFail($id);
 
         $request->validate([
             'name' => 'required|string|unique:levels,name,' . $id
         ]);
 
         $level->update($request->all());
 
         return response()->json([
             'message' => 'Level updated successfully',
             'data' => $level
         ]);
     }
 
     // Delete level
     public function destroy($id)
     {
         $level = Level::findOrFail($id);
         $level->delete();
 
         return response()->json(['message' => 'Level deleted successfully']);
     }
}
