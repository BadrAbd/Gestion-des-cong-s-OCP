<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeConge extends Model
{
    use HasFactory;
    protected $table = 'demande_conges';

    protected $fillable = [
        'user_id',
        'date_debut',
        'date_fin',
        'signature_image',
        'nom',
        'prenom',
        'interim',
        'status'
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];
    protected static function booted()
    {
        static::creating(function ($demandeConge) {
            // Set user_id to current authenticated user if not already set
            if (!$demandeConge->user_id) {
                $demandeConge->user_id = Auth::id() ?? 1; // Fallback to 1 if not authenticated
            }
        });
    }

    public function user()
    {
     return $this->belongsTo(User::class);
    }
}