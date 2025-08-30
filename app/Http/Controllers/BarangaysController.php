<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use Illuminate\Http\Request;

class BarangaysController extends Controller
{
    // Display list of barangays
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Barangay::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $barangays = $query->orderBy('id', 'desc')->get(); // fetch all records, no pagination

        $page = [
            'title' => 'Barangays',
            'parent' => 'election',
            'child' => 'subfield1',
            'crumb' => 'Barangays List',
        ];

        return view('barangays.index', compact('barangays', 'page'));
    }

    // Show create form
    public function create()
    {
        $page = [
            'parent' => 'Master Data',
            'child' => 'Create Barangay',
            'title' => 'Add Barangay',
            'crumb' => [
                'Dashboard' => route('dashboard'),
                'Barangays' => route('barangays.index'),
                'Create' => ''
            ]
        ];

        return view('barangays.create', compact('page'));
    }

    // Store new barangay
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:barangays,name|max:120'
        ]);

        Barangay::create($request->all());

        return redirect()->route('barangays.index')->with('success', 'Barangay created successfully.');
    }

    // Show a specific barangay
    public function show(Barangay $barangay)
    {
        $page = [
            'parent' => 'Master Data',
            'child' => 'Barangays',
            'title' => 'View Barangay',
            'crumb' => [
                'Dashboard' => route('dashboard'),
                'Barangays' => route('barangays.index'),
                $barangay->name => ''
            ]
        ];

        return view('barangays.show', compact('barangay', 'page'));
    }

    // Show edit form
    public function edit(Barangay $barangay)
    {
        $page = [
            'parent' => 'Master Data',
            'child' => 'Edit Barangay',
            'title' => 'Edit Barangay',
            'crumb' => [
                'Dashboard' => route('dashboard'),
                'Barangays' => route('barangays.index'),
                'Edit' => ''
            ]
        ];

        return view('barangays.edit', compact('barangay', 'page'));
    }

    // Update barangay
    public function update(Request $request, Barangay $barangay)
    {
        $request->validate([
            'name' => 'required|unique:barangays,name,' . $barangay->id . '|max:120'
        ]);

        $barangay->update($request->only('name')); // only update 'name'

        return redirect()->route('barangays.index')->with('success', 'Barangay updated successfully.');
    }

    // Delete barangay
    public function destroy(Barangay $barangay)
    {
        $barangay->delete();

        return redirect()->route('barangays.index')->with('success', 'Barangay deleted successfully.');
    }
}
