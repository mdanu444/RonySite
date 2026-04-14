<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisaSearch extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Visa::where ('visa_number', $request->input('visa_number'))->first();
        if ($profile) {
            return response()->json($profile);
        } else {
            return response()->json(['error' => 'Visa not found'], 404);
        }

        // $inputCaptcha = $request('captcha') ?? '';
        // $sessionCaptcha = session()->get('captcha') ?? '';
        // $visaNumber = $request('visa') ?? '';

        // if ($inputCaptcha === $sessionCaptcha) {
        //     return response()->json(['success' => true]);
        // } else {
        //     return response()->json(['success' => false]);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
