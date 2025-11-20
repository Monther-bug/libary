<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classifications = Classification::all();
        return view('admin.classifications.index', compact('classifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:classifications,name',
        ]);

        $classification = Classification::create($validated);
        return redirect()->route('admin.classifications.index')->with('success', 'Classification created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Classification $classification)
    {
        return  view('admin.classifications.show', compact('classification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Classification $classification)
    {
        return view('admin.classifications.edit', compact('classification'));
    }
    public function update(Request $request, Classification $classification)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:classifications,name,' . $classification->id,
        ]);

        $classification->update($validated);
        return redirect()->route('admin.classifications.index')->with('success', 'Classification updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classification $classification)
    {
        $classification->delete();
        return redirect()->route('admin.classifications.index')->with('success', 'Classification deleted successfully.');

        // return response()->json(null, 204);
    }
}
