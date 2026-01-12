@extends('layout')

@section('title', 'Ventes')

@section('content')
<div class="container mx-auto mt-8 px-4">

    <!-- Titre -->
    <h1 class="text-3xl font-bold text-yellow-700 mb-6">
        Liste des Ventes
    </h1>

    <!-- Bouton ajouter -->
    <a href="{{ route('sales.create') }}"
       class="bg-green-600 text-white px-5 py-2 rounded-lg inline-block mb-6 hover:bg-green-700 transition">
        ➕ Ajouter une vente
    </a>

    <!-- Table responsive -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-200">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 border-b text-left">ID</th>
                    <th class="px-6 py-3 border-b text-left">Produits</th>
                    <th class="px-6 py-3 border-b text-left">Client</th>
                    <th class="px-6 py-3 border-b text-left">Montant total</th>
                    <th class="px-6 py-3 border-b text-left">Date</th>
                    <th class="px-6 py-3 border-b text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($sales as $sale)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $sale->id }}</td>

                    <td class="px-6 py-3 border-b">
                        @foreach($sale->orderLines as $line)
                            • {{ $line->product->name }} (x{{ $line->quantity }})<br>
                        @endforeach
                    </td>

                    <td class="px-4 py-2 border-b">{{ $sale->client->name ?? '-' }}</td>

                    <td class="px-4 py-2 border-b font-semibold">
                        {{ number_format($sale->total_amount, 0, ',', ' ') }} FCFA
                    </td>

                    <td class="px-4 py-2 border-b">
                        {{ $sale->sale_date->format('d/m/Y') }}
                    </td>

                    <!-- COLONNE ACTIONS -->
                    <td class="px-4 py-2 border-b text-center space-x-2">
                        @foreach($sale->orderLines as $line)
                        <!-- Détails produit -->
                        <a href="{{ route('products.show', $line->product->id) }}"
                           class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600 inline-block mb-1"
                           title="Voir le produit">
                            👁️
                        </a>

                        <!-- Modifier produit -->
                        <a href="{{ route('products.edit', $line->product->id) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 inline-block mb-1"
                           title="Modifier le produit">
                            ✏️
                        </a>
                        @endforeach

                        <!-- Supprimer vente -->
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Supprimer cette vente ?')"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 inline-block mb-1"
                                    title="Supprimer la vente">
                                🗑️
                            </button>
                        </form>

                        <!-- Imprimer reçu -->
                        <a href="{{ route('sales.receipt', $sale->id) }}" target="_blank"
                           class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 inline-block mb-1"
                           title="Imprimer le reçu">
                            🧾
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<style>
    /* Conteneur */
.container {
    max-width: 1200px;
    margin: auto;
    padding: 0 1rem;
}

/* Table */
table {
    width: 50%;
    border-collapse: collapse;
}

th, td {
    padding: 0.75rem 1rem;
    border-bottom: 1px solid #e5e7eb; /* gris clair */
    font-size: 1rem;
}

/* Header */
th {
    background-color: #f3f4f6; /* gris clair */
    font-weight: 600;
}

/* Hover sur lignes */
tr:hover {
    background-color: #f9fafb;
}

/* Boutons actions */
a, button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 0.5rem;
    transition: all 0.2s ease-in-out;
}

a:hover, button:hover {
    transform: scale(1.05);
}

/* Texte des montants */
td.font-semibold {
    font-weight: 600;
    color: #111827;
}

</style>