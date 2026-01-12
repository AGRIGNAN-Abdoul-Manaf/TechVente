@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-8">

    <!-- Titre -->
    <h1 class="text-2xl font-bold mb-6 text-yellow-700">Modifier une vente</h1>

    <!-- Formulaire -->
    <form action="{{ route('sales.update', $sale->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Client -->
        <div class="flex flex-col">
            <label for="client_id" class="font-semibold mb-1">Client :</label>
            <select name="client_id" id="client_id" required
                    class="border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-yellow-200 focus:outline-none">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $sale->client_id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Date de la vente -->
        <div class="flex flex-col">
            <label for="sale_date" class="font-semibold mb-1">Date :</label>
            <input type="date" name="sale_date" id="sale_date" 
                   value="{{ $sale->sale_date }}" required
                   class="border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-yellow-200 focus:outline-none">
        </div>

        <!-- Date d’échéance -->
        <div class="flex flex-col">
            <label for="due_date" class="font-semibold mb-1">Date d'échéance :</label>
            <input type="date" name="due_date" id="due_date"
                   value="{{ $sale->due_date ?? '' }}"
                   class="border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-yellow-200 focus:outline-none">
        </div>

        <!-- Montant total -->
        <div class="flex flex-col">
            <label for="total_amount" class="font-semibold mb-1">Montant total (FCFA) :</label>
            <input type="number" name="total_amount" id="total_amount" 
                   value="{{ $sale->total_amount }}" required
                   class="border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-yellow-200 focus:outline-none">
        </div>

        <!-- Boutons -->
        <div class="flex gap-3 mt-4">
            <button type="submit" class="bg-yellow-600 text-white px-5 py-2 rounded-lg hover:bg-yellow-700 transition">
                Mettre à jour
            </button>
            <a href="{{ route('sales.index') }}" 
               class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600 transition">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
<style>
    /* Formulaire de modification des ventes */
form.space-y-4 > div {
    margin-bottom: 1rem;
}

/* Champs inputs et selects */
input[type="text"],
input[type="number"],
input[type="date"],
select {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border: 1px solid #d1d5db; /* gris clair */
    border-radius: 0.5rem;
    font-size: 1rem;
    transition: all 0.2s ease-in-out;
}

input:focus,
select:focus {
    outline: none;
    border-color: #f59e0b; /* jaune */
    box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.2);
}

/* Boutons */
button, a {
    font-weight: 600;
    text-align: center;
    transition: all 0.2s ease-in-out;
}

button:hover, a:hover {
    transform: scale(1.03);
}

/* Titre de page */
h1.page-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #ca8a04; /* jaune foncé */
}

</style>