<?php

use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Check if the user is authenticated
    if (Auth::check()) {
        // If authenticated, redirect to the dashboard or another authenticated page
        return redirect('/dashboard');
    } else {
        // If not authenticated, redirect to the login page
        return redirect('/login');
    }
});


// Route to display the session creation form
Route::get('/create-session', [SessionController::class, 'create'])->name('session.create');

// Route to handle the form submission
Route::post('/store-session', [SessionController::class, 'store'])->name('session.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Sessions
Route::middleware(['auth'])->prefix('sessions')->name('sessions.')->group(function () {
    Route::get('/', [SessionController::class, 'index'])->name('index');
    Route::get('/create', [SessionController::class, 'create'])->name('create');
    Route::post('/store', [SessionController::class, 'store'])->name('store');
    Route::get('/join', [SessionController::class, 'join'])->name('join');
    Route::post('/addUser', [SessionController::class, 'addUser'])->name('addUser');

    // Add this route for managing a specific session with session_id in the URL
    Route::get('/{session_id}/manage', [SessionController::class, 'manage'])->name('manage');

});

// Features
Route::middleware(['auth'])->prefix('features')->name('features.')->group(function () {
    Route::post('/store{session_id}', [FeatureController::class, 'store'])->name('store');
});
require __DIR__.'/auth.php';
