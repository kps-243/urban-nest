<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/home', function () {
    return Inertia::render('Home');
});

Route::get('/contact', function () {
    return Inertia::render('Contact/Index');
})->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.sendMail');

Route::get('/qui-sommes-nous', function () {
    return Inertia::render('Qui-sommes-nous/Index');
})->name('about');

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
Route::post('/properties/store', [PropertyController::class, 'store'])->name('properties.store');
Route::get('/properties/edit/{id}', [PropertyController::class, 'edit'])->name('properties.edit');
Route::put('/properties/update/{id}', [PropertyController::class, 'update'])->name('properties.update');
Route::delete('/properties/delete/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');

Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.single');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/products', function () {
        return Inertia::render('Products/Index');
    })->name('products.index');
});
