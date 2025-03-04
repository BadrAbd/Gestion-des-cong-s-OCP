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
            'signature' => 'required|string',
        ]);
        // Save the signature as an image file
        $signatureData = $request->input('signature');
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
        $signatureData = str_replace(' ', '+', $signatureData);
        $signatureImage = base64_decode($signatureData);
        $signaturePath = 'signatures/' . uniqid() . '.png';
        Storage::disk('public')->put($signaturePath, $signatureImage);

        // Handle the form submission logic (e.g., save to database)
        // Example:
        // Interim::create($request->all());

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}