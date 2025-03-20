<?php

namespace App\Http\Controllers;

use App\Models\Interim;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $demandes = Interim::orderBy('created_at', 'desc')->get();
        return view('admin.demandes', compact('demandes'));
    }

    public function updateStatus(Request $request, Interim $demande)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $demande->update([
            'status' => $request->status,
            'admin_comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Le statut de la demande a été mis à jour.');
    }
} 