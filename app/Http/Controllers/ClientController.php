<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Applique le middleware d'authentification
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Liste tous les clients
     */
    public function index()
{
    $clients = Client::all();
    return view('clients.index', compact('clients'));
}


    /**
     * Affiche le formulaire de création d’un client
     */
     public function create()
    {
        return view('clients.create'); // correspond au fichier Blade
    }

    // Enregistre le client
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        // Création
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('clients.create')
                         ->with('success', 'Client ajouté avec succès !');
    }
     
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Affiche le formulaire d’édition d’un client
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Met à jour un client
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $client->update($request->only(['name', 'email', 'phone', 'address']));

        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }

    /**
     * Supprime un client
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }

    public function history($id)
{
    $client = \App\Models\Client::findOrFail($id);
    $sales = \App\Models\Sale::where('client_id', $client->id)
                ->with(['orderLines.product'])
                ->orderBy('sale_date', 'desc')
                ->get();

    return view('clients.history', compact('client', 'sales'));
}

public function dashboard()
{
    return view('client.dashboard');
}


}
