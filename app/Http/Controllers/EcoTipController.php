<?php

namespace App\Http\Controllers;

use App\Models\EcoTip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EcoTipController extends Controller
{
    /**
     * Display all eco tips
     */
    public function index()
    {
        $tips = EcoTip::latest()->paginate(10);
        return view('eco-tips.index', compact('tips'));
    }

    /**
     * Show the create form
     */
    public function create()
    {
        return view('eco-tips.create');
    }

    /**
     * Store a new eco tip
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/eco-tips');
            $validated['image_path'] = str_replace('public/', '', $path);
        }

        EcoTip::create($validated);

        return redirect()->route('eco-tips.index')
            ->with('success', 'Eco tip created successfully!');
    }

    /**
     * Display a single eco tip
     */
    public function show(EcoTip $eco_tip)
    {
        return view('eco-tips.show', compact('eco_tip'));
    }

    /**
     * Show the edit form
     */
    public function edit(EcoTip $eco_tip)
    {
        return view('eco-tips.edit', compact('eco_tip'));
    }

    /**
     * Update an eco tip
     */
    public function update(Request $request, EcoTip $eco_tip)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($eco_tip->image_path) {
                Storage::delete('public/' . $eco_tip->image_path);
            }
            
            $path = $request->file('image')->store('public/eco-tips');
            $validated['image_path'] = str_replace('public/', '', $path);
        }

        $eco_tip->update($validated);

        return redirect()->route('eco-tips.index')
            ->with('success', 'Eco tip updated successfully!');
    }

    /**
     * Delete an eco tip
     */
    public function destroy(EcoTip $eco_tip)
    {
        if ($eco_tip->image_path) {
            Storage::delete('public/' . $eco_tip->image_path);
        }

        $eco_tip->delete();

        return redirect()->route('eco-tips.index')
            ->with('success', 'Eco tip deleted successfully!');
    }
}