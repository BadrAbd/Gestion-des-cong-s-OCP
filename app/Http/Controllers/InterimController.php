<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterimController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'service' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'interim' => 'required|string|max:255',
        ]);

        // Handle the form submission logic (e.g., save to database)
        // Example:
        // Interim::create($request->all());

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}