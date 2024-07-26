<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Inertia\Inertia;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'admin'|| auth()->user()->role === 'commercial'){
            $properties = Property::all();
        
            return Inertia::render('Properties/Index', [
                'properties' => $properties->map(function ($property) {
                    return [
                        'id' => $property->id,
                        'nom' => $property->nom,
                        'prenom' => $property->prenom,
                        'localisation' => $property->localisation,
                        'm2' => $property->m2,
                        'type' => $property->type,
                        'etat' => $property->etat,
                        'nombre_chambre' => $property->nombre_chambre,
                        'nombre_salle_bain' => $property->nombre_salle_bain,
                        'parking' => $property->parking,
                        'garage' => $property->garage,
                        'terrain' => $property->terrain,
                    ];
                }),
            ]);
        } else {
            return Inertia::render('Home')
                ->with('error', 'Vous n\'avez pas les droits pour éditer une propriété');
        }
        
    }

    public function frontindex()
    {
        $properties = Property::all();
        
        return Inertia::render('Properties/FrontIndex', [
            'properties' => $properties->map(function ($property) {
                return [
                    'id' => $property->id,
                    'nom' => $property->nom,
                    'prenom' => $property->prenom,
                    'localisation' => $property->localisation,
                    'm2' => $property->m2,
                    'type' => $property->type,
                    'etat' => $property->etat,
                    'nombre_chambre' => $property->nombre_chambre,
                    'nombre_salle_bain' => $property->nombre_salle_bain,
                    'parking' => $property->parking,
                    'garage' => $property->garage,
                    'terrain' => $property->terrain,
                ];
            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role === 'admin' || auth()->user()->role === 'commercial'){
            return Inertia::render('Properties/Create');
        } else {
            return Inertia::render('Home')
            ->with('error', 'Vous n\'avez pas les droits pour éditer une propriété');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $validatedData = $request->validated();
    
        // Créez une nouvelle instance de Property
        $property = new Property();
    
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $property->addMedia($file)->toMediaCollection('gallery');
            }
        }
        // Assignez manuellement les champs de la requête aux propriétés de Property
        $property->nom = $validatedData['nom'];
        $property->prenom = $validatedData['prenom'];
        $property->localisation = $validatedData['localisation'];
        $property->m2 = $validatedData['m2'];
        $property->type = $validatedData['type'];
        $property->etat = $validatedData['etat'];
        $property->nombre_chambres = $validatedData['nombre_chambres'];
        $property->nombre_salles_de_bain = $validatedData['nombre_salles_de_bain'];
        $property->parking = $validatedData['parking'];
        $property->garage = $validatedData['garage'];
        $property->terrain = $validatedData['terrain'];
    
        // Enregistrez la nouvelle propriété dans la base de données
        $property->save();
    
        // Redirigez l'utilisateur vers l'index des propriétés avec un message de succès
        return redirect()->route('properties.index')
            ->with('success', 'Propriété créée avec succès !');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $property = Property::where('id', $id)->with('media')->firstOrFail();

        return Inertia::render('Properties/Single', [
            'property' => Property::findOrFail($id),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'commercial'){
            return Inertia::render('Properties/Edit', [
                'property' => Property::findOrFail($id),
            ]);
        } else {
            return Inertia::render('Home')
                ->with('error', 'Vous n\'avez pas les droits pour éditer une propriété');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, $id)
    {
        $property = Property::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('gallery')) {
            $property->clearMediaCollection('gallery'); // Supprimez les anciennes images si nécessaire
            foreach ($request->file('gallery') as $file) {
                $property->addMedia($file)->toMediaCollection('gallery');
            }
        }
        // Assignez manuellement les champs de la requête aux propriétés de Property
        $property->nom = $validatedData['nom'];
        $property->prenom = $validatedData['prenom'];
        $property->localisation = $validatedData['localisation'];
        $property->m2 = $validatedData['m2'];
        $property->type = $validatedData['type'];
        $property->etat = $validatedData['etat'];
        $property->nombre_chambres = $validatedData['nombre_chambres'];
        $property->nombre_salles_de_bain = $validatedData['nombre_salles_de_bain'];
        $property->parking = $validatedData['parking'];
        $property->garage = $validatedData['garage'];
        $property->terrain = $validatedData['terrain'];

        // Enregistrez la nouvelle propriété dans la base de données
        $property->save();

        return redirect()->route('properties.index')
            ->with('success', 'Propriété mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
