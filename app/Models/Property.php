<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Property extends Model implements HasMedia
{
    use HasSlug;
    use InteractsWithMedia;
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

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nom')
            ->saveSlugsTo('slug')
            ->usingSeparator('-')
            ->allowDuplicateSlugs();
    }
}
