<?php

namespace App\Http\Controllers;
use App\Models\DemandeConge;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $demandeConge = DemandeConge::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'service' => $request->service,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'interim' => $request->interim,
            'signature_image' => $signaturePath,
            'status' => 'En attente',
        ]);

        // Si le paramètre download_pdf est présent, télécharger directement le PDF
        if ($request->has('download_pdf')) {
            return $this->generatePdf($demandeConge->id);
        }

        // Sinon, rediriger vers la page du formulaire avec un message de succès
        return redirect()->back()->with([
            'success' => 'Votre demande a été bien enregistrée.',
            'demande_id' => $demandeConge->id
        ]);
    }

    /**
     * Générer un PDF pour une demande d'intérim
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function generatePdf($id)
    {
        $demandeConge = DemandeConge::findOrFail($id);
        
        // Récupérer l'image de signature
        $signatureImagePath = $demandeConge->signature_image;
        $signatureImageData = null;
        
        if (Storage::disk('private')->exists($signatureImagePath)) {
            $signatureImageData = base64_encode(Storage::disk('private')->get($signatureImagePath));
        }
        
        // Récupérer le logo OCP
        $logoPath = public_path('assets/img/OCP Group.png');
        $logoData = null;
        
        if (file_exists($logoPath)) {
            $logoData = base64_encode(file_get_contents($logoPath));
        }
        
        // Générer le PDF
        $pdf = PDF::loadView('pdf.interim', [
            'demande' => $demandeConge,
            'signatureImage' => $signatureImageData,
            'logoImage' => $logoData
        ]);
        
        // Nom du fichier PDF
        $filename = 'demande_interim_' . $demandeConge->id . '.pdf';
        
        // Télécharger le PDF
        return $pdf->download($filename);
    }
}
