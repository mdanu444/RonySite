<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VisaSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visas = Visa::paginate(10);
        return view('visas.index', compact('visas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('visas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'visa_number' => 'required|unique:visas|string|max:100',
            'surname' => 'nullable|string|max:100',
            'firstname' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'citizenship' => 'required|string|max:100',
            'passport_number' => 'required|string|max:100',
            'visa_status' => 'required|string|max:100',
            'visa_validity' => 'required|date',
            'visa_type' => 'required|string|max:100',
            'visit_purpose' => 'required|string|max:255',
            'photo_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
            $validated['photo_path'] = $request->file('photo_path')->store('visa-photos', 'public');
        }

        Visa::create($validated);

        return redirect()->route('visas.index')->with('success', 'Visa created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visa $visa)
    {
        return view('visas.show', compact('visa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visa $visa)
    {
        return view('visas.edit', compact('visa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visa $visa)

    {
        $validated = $request->validate([
            'visa_number' => 'required|unique:visas,visa_number,' . $visa->id . '|string|max:100',
            'surname' => 'nullable|string|max:100',
            'firstname' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'citizenship' => 'required|string|max:100',
            'passport_number' => 'required|string|max:100',
            'visa_status' => 'required|string|max:100',
            'visa_validity' => 'required|date',
            'visa_type' => 'required|string|max:100',
            'visit_purpose' => 'required|string|max:255',
            'photo_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {

        $validated['photo_path'] = $request->file('photo_path')->store('visa-photos', 'public');

        $old_image_path = public_path('storage/' . $visa->photo_path);
        if (File::exists($old_image_path)) {
            //File::delete($image_path);
            unlink($old_image_path);
        }

        }

        $visa->update($validated);

        return redirect()->route('visas.show', $visa)->with('success', 'Visa updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visa $visa)
    {

        $image_path = public_path('storage/' . $visa->photo_path);
        File::exists($image_path);

        if (File::exists($image_path)) {
            //File::delete($image_path);
            unlink($image_path);
        }

        $visa->delete();
        return redirect()->route('visas.index')->with('success', 'Visa deleted successfully!');
    }

    /**
     * Search visa by visa number.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $visas = Visa::where('visa_number', 'like', "%{$query}%")
            ->orWhere('firstname', 'like', "%{$query}%")
            ->orWhere('surname', 'like', "%{$query}%")
            ->paginate(10);
        return view('visas.index', compact('visas'));
    }
}
