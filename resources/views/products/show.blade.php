@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8 p-6 bg-white rounded-xl shadow-lg border border-gray-200">

    <!-- Titre du produit -->
    <h1 class="text-4xl font-extrabold text-green-700 mb-6">{{ $product->name }}</h1>

    <!-- Détails du produit -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-gray-700"><span class="font-semibold">Catégorie :</span> {{ $product->category->name ?? '-' }}</p>
            <p class="text-gray-700"><span class="font-semibold">Prix :</span> {{ number_format($product->price, 0, ',', ' ') }} FCFA</p>
            <p class="text-gray-700"><span class="font-semibold">Quantité en stock :</span> {{ $product->quantity }}</p>
        </div>

        <div>
            <p class="text-gray-700"><span class="font-semibold">Description :</span></p>
            <p class="text-gray-600 mt-1">{{ $product->description }}</p>
        </div>
    </div>

    <!-- Boutons -->
    <div class="mt-6 flex flex-wrap gap-3">
        <a href="{{ route('products.index') }}"
           class="px-5 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-200">
           Retour aux produits
        </a>

        <a href="{{ route('products.edit', $product->id) }}"
           class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
           Modifier le produit
        </a>
    </div>
</div>
@endsection

<style>
    .product-card {
    max-width: 800px;
    margin: 2rem auto;
    padding: 2rem;
    background: #fff;
    border-radius: 1rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    border: 1px solid #e2e8f0;
}

.product-card h1 {
    font-size: 2.5rem;
    font-weight: 800;
    color: #16a34a; /* vert */
    margin-bottom: 1.5rem;
}

.product-card p {
    font-size: 1.125rem;
    color: #374151;
    margin-bottom: 0.75rem;
}

.product-card .label {
    font-weight: 600;
}

.product-card .buttons {
    margin-top: 1.5rem;
    display: flex;
    gap: 1rem;
}

.product-card .buttons a {
    text-decoration: none;
    padding: 0.5rem 1.5rem;
    border-radius: 0.5rem;
    color: #fff;
    transition: 0.2s;
}

.product-card .buttons a.back {
    background-color: #4b5563; /* gris */
}

.product-card .buttons a.back:hover {
    background-color: #374151;
}

.product-card .buttons a.edit {
    background-color: #2563eb; /* bleu */
}

.product-card .buttons a.edit:hover {
    background-color: #1d4ed8;
}

</style>