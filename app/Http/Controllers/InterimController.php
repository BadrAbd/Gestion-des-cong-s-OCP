<?php

namespace App\Http\Controllers;
use App\Models\DemandeConge;
use Illuminate\Support\Facades\Storage; // Add this line

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
            'date_fin' => 'required|date|after:date_debut',
            'interim' => 'required|string|max:255',
            'signature' => 'required|string',
        ]);
        // Save the signature as an image file
        $signatureData = $request->input('signature');
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
        $signatureData = str_replace(' ', '+', $signatureData);
        $signatureImage = base64_decode($signatureData);
        $signaturePath = 'signatures/' . uniqid() . '.png';
        Storage::disk('private')->put($signaturePath, $signatureImage);

        // Handle the form submission logic (e.g., save to database)
        // Example:
        // Interim::create($request->all());

        // Sauvegarder les données dans la base de données
        DemandeConge::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'service' => $request->service,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'interim' => $request->interim,
            'signature_image' => $signaturePath, // Sauvegarder le chemin de l'image de la signature
            'status' => 'En attente', // Par exemple, définir un statut initial
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Votre demande a été bien enregistrée.');
    }
}
