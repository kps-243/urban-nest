<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display the homepage with the latest properties.
     */
    public function index()
    {
        $latestProperties = Property::latest()->take(3)->get();

        return Inertia::render('Home', [
            'latestProperties' => $latestProperties,
        ]);
    }
}
