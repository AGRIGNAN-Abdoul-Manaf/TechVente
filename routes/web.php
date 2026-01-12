<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Routes publiques (login/register) et routes protégées (auth)
|
*/

// ------------------------------------------------------
// 🔐 PAGE D'ACCUEIL — Redirection vers la page de connexion
// ------------------------------------------------------
Route::get('/', function () {
    return redirect()->route('login');
});

// ------------------------------------------------------
// 🧍 AUTHENTIFICATION (publiques)
// ------------------------------------------------------
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ------------------------------------------------------
// 🔑 MOT DE PASSE OUBLIÉ / RÉINITIALISATION
// ------------------------------------------------------
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])
    ->name('password.update');

// ------------------------------------------------------
// 🔒 ROUTES PROTÉGÉES (utilisateur connecté)
// ------------------------------------------------------
Route::middleware(['auth'])->group(function () {

    // 🏠 Tableau de bord
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 📦 Produits CRUD
    Route::resource('products', ProductController::class);

    // 👥 Clients CRUD
    Route::resource('clients', ClientController::class);

    // 💰 Ventes CRUD + routes spécifiques
    Route::resource('sales', SaleController::class);
    Route::get('/sales/{id}/receipt', [SaleController::class, 'receipt'])->name('sales.receipt');
    Route::get('/sales/{id}/print', [SaleController::class, 'print'])->name('sales.print');

    // 📊 Rapports CRUD
    Route::resource('reports', ReportController::class);

    // 👤 Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // 🧾 Historique des achats d’un client
    Route::get('/clients/{client}/history', [ClientController::class, 'history'])
        ->name('clients.history');
        // Page d'accueil publique
        // Route pour la page Termes et Conditions
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');
// Route publique pour afficher tous les produits
Route::get('/produits', [App\Http\Controllers\ProductController::class, 'publicIndex'])->name('products.public');


Route::get('/produits', [ProductController::class, 'publicIndex'])
    ->name('products.public');

    

    

});
