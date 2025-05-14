<?php

namespace App\Http\Controllers;

use App\Models\EcoTip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EcoTipController extends Controller
{
    /**
     * Constructor to apply policy checks
     */
    public function __construct()
    {
        // No middleware, we will use policies directly for authorization
        $this->authorizeResource(EcoTip::class, 'eco_tip');
    }

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
        $this->authorize('create', EcoTip::class); // Only admins can create

        return view('eco-tips.create');
    }

    /**
     * Store a new eco tip
     */
    public function store(Request $request)
{
    $this->authorize('create', EcoTip::class);

    $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'category' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('eco-tips', 'public');
        $validated['image_path'] = $path;
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
        $this->authorize('view', $eco_tip); // Any user can view eco tips

        return view('eco-tips.show', compact('eco_tip'));
    }

    /**
     * Show the edit form
     */
    public function edit(EcoTip $eco_tip)
    {
        $this->authorize('update', $eco_tip); // Only admins can edit

        return view('eco-tips.edit', compact('eco_tip'));
    }

    /**
     * Update an eco tip
     */
    public function update(Request $request, EcoTip $eco_tip)
    {
        $this->authorize('update', $eco_tip); // Only admins can update

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            dd($request->file('image')); // this will stop execution and show the file info
            $path = $request->file('image')->store('eco-tips', 'public');
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
        $this->authorize('delete', $eco_tip); // Only admins can delete

        if ($eco_tip->image_path) {
            Storage::delete('public/' . $eco_tip->image_path);
        }

        $eco_tip->delete();

        return redirect()->route('eco-tips.index')
            ->with('success', 'Eco tip deleted successfully!');
    }
}
