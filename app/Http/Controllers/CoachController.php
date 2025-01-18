<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::all();
        return view('coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('coaches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:coaches',
            'password' => 'required|min:6',
            'age' => 'nullable|integer|min:0',
            'specialization' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle image upload
        $imagePath = $request->file('image') ? $request->file('image')->store('coaches', 'public') : null;

        Coach::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'age' => $request->age,
            'specialization' => $request->specialization,
            'phone' => $request->phone,
            'image' => $imagePath, // Save image path
        ]);

        return redirect()->route('coaches.index')->with('success', 'Coach created successfully.');
    }

    public function edit($id)
    {
        $coach = Coach::findOrFail($id);
        return view('coaches.edit', compact('coach'));
    }

    public function update(Request $request, $id)
    {
        $coach = Coach::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:coaches,email,' . $coach->id,
            'password' => 'nullable|min:6',
            'age' => 'nullable|integer|min:0',
            'specialization' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($coach->image) {
                Storage::disk('public')->delete($coach->image);
            }
            $imagePath = $request->file('image')->store('coaches', 'public');
        } else {
            $imagePath = $coach->image; // Keep the existing image
        }

        $coach->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $coach->password,
            'age' => $request->age,
            'specialization' => $request->specialization,
            'phone' => $request->phone,
            'image' => $imagePath, // Update image path
        ]);

        return redirect()->route('coaches.index')->with('success', 'Coach updated successfully.');
    }

    public function destroy($id)
    {
        $coach = Coach::findOrFail($id);
        
        // Delete the image if it exists
        if ($coach->image) {
            Storage::disk('public')->delete($coach->image);
        }
        
        $coach->delete();

        return redirect()->route('coaches.index')->with('success', 'Coach deleted successfully.');
    }
}