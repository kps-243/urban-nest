<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'localisation',
        'm2',
        'type',
        'etat',
        'nombre_chambre',
        'nombre_salle_bain',
        'parking',
        'garage',
        'terrain',
    ];

    // Si nécessaire, vous pouvez définir les types de données de colonnes spécifiques
    protected $casts = [
        'parking' => 'boolean',
        'garage' => 'boolean',
        'terrain' => 'boolean',
    ];
}
