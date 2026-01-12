@extends('layout')

@section('title', 'Produits')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Liste des Produits</h1>

    <!-- Bouton Ajouter -->
    <a href="{{ route('products.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-green-700">
        ➕ Ajouter un produit
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Image</th> <!-- Nouvelle colonne -->
                    <th class="px-4 py-2 border-b">Nom</th>
                    <th class="px-4 py-2 border-b">Prix</th>
                    <th class="px-4 py-2 border-b">Catégorie</th>
                    <th class="px-4 py-2 border-b text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $product->id }}</td>

                    <!-- Image -->
                    <td class="px-4 py-2 border-b">
                        @if($product->image)
                            <img src="{{ asset('storage/products/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-16 h-16 object-cover rounded-md mx-auto">
                        @else
                            <span class="text-gray-400 italic">Pas d'image</span>
                        @endif
                    </td>

                    <td class="px-4 py-2 border-b">{{ $product->name }}</td>
                    <td class="px-4 py-2 border-b">
                        {{ number_format($product->price, 0, ',', ' ') }} FCFA
                    </td>
                    <td class="px-4 py-2 border-b">
                        {{ $product->category->name ?? '-' }}
                    </td>

                    <!-- ACTIONS -->
                    <td class="px-4 py-2 border-b text-center space-x-2">

                        <!-- Détails -->
                        <a href="{{ route('products.show', $product->id) }}"
                           class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600">
                            👁️
                        </a>

                        <!-- Modifier -->
                        <a href="{{ route('products.edit', $product->id) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            ✏️
                        </a>

                        <!-- Supprimer -->
                        <form action="{{ route('products.destroy', $product->id) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Supprimer ce produit ?')"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                🗑️
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('styles')
<style>
/* ----------------------------
   Table Produits
----------------------------- */
table {
    border-collapse: collapse;
    font-family: 'Poppins', sans-serif;
}

th, td {
    text-align: left;
    padding: 12px;
}

th {
    background-color: #f3f4f6;
    font-weight: 600;
}

td {
    vertical-align: middle;
}

tr:hover {
    background-color: #f9fafb;
}

/* Images des produits */
table img {
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    object-fit: cover;
}

/* Boutons actions */
a, button {
    font-size: 0.9rem;
}

button {
    cursor: pointer;
}

/* Responsive */
@media (max-width: 768px) {
    table th, table td {
        padding: 8px;
        font-size: 0.85rem;
    }

    table img {
        width: 40px;
        height: 40px;
    }
}
</style>
@endsection
