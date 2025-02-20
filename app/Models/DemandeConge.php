<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeConge extends Model
{
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

    public function user()
    {
     return $this->belongsTo(User::class);
    }
}