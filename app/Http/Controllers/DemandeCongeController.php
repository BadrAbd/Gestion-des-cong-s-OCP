<?php

namespace App\Http\Controllers;

use App\Models\DemandeConge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeCongeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->is_admin) {
            // Pour les admins, afficher toutes les demandes
            $demandes = DemandeConge::with(['user', 'user.service'])->latest()->get();
        } else {
            // Pour les utilisateurs normaux, afficher uniquement leurs demandes
            $demandes = DemandeConge::where('user_id', $user->id)->with(['user', 'user.service'])->latest()->get();
        }

        return view('demande-conges.index', compact('demandes'));
    }

    public function updateStatus(Request $request, DemandeConge $demandeConge)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->back()->with('error', 'Accès non autorisé');
        }

        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $demandeConge->update([
            'status' => $request->status,
            'admin_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Statut de la demande mis à jour avec succès');
    }
} 