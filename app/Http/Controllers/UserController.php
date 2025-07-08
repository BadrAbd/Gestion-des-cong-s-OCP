<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::user()->is_admin) {
            return redirect()->back()->with('error', 'Accès non autorisé');
        }

        $users = User::with('service')->get();
        return view('users.index', compact('users'));
    }

    public function toggleAdmin(User $user)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->back()->with('error', 'Accès non autorisé');
        }

        // Empêcher de modifier son propre statut admin
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas modifier votre propre statut administrateur');
        }

        $user->update([
            'is_admin' => !$user->is_admin
        ]);

        $status = $user->is_admin ? 'administrateur' : 'utilisateur normal';
        return redirect()->back()->with('success', "L'utilisateur {$user->nom} {$user->prenom} est maintenant {$status}");
    }
} 