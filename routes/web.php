<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ici se trouvent toutes les routes de ton application web Laravel.
| Les routes publiques (login/register) sont en dehors du middleware auth.
| Les routes protégées (dashboard, produits, clients, etc.) nécessitent une connexion.
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
// 🔒 ROUTES PROTÉGÉES (seulement pour les utilisateurs connectés)
// ------------------------------------------------------
Route::middleware(['auth'])->group(function () {

    // 🏠 Tableau de bord
   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // 📦 Produits CRUD
    Route::resource('products', ProductController::class);

    // 👥 Clients CRUD
    Route::resource('clients', ClientController::class);

    // 💰 Ventes CRUD
    Route::resource('sales', SaleController::class);
    Route::get('/sales/{id}/receipt', [App\Http\Controllers\SaleController::class, 'receipt'])->name('sales.receipt');

    

    // 📊 Rapports CRUD
    Route::resource('reports', ReportController::class);

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Historique des achats d’un client
Route::get('/clients/{client}/history', [App\Http\Controllers\ClientController::class, 'history'])
    ->name('clients.history')
    ->middleware('auth');



});
