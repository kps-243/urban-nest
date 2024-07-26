<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display the homepage with the latest properties.
     */
    public function index()
    {
        if(auth()->user()->role === 'admin') {
            $users = User::all();

            return Inertia::render('Auth/Index', [
                'users' => $users,
        ]);
        } else {
            return Inertia::render('Home');
        }   
        
    }
}
