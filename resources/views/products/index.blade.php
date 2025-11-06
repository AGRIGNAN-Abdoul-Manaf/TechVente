@extends('layout')

@section('title', 'Produits')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold text-green-700 mb-4"> Liste des Produits</h1>

    <a href="{{ route('products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-green-600">+ Ajouter un produit</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Nom</th>
                    <th class="px-4 py-2 border-b">Prix</th>
                    <th class="px-4 py-2 border-b">Catégorie</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $product->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $product->name }}</td>
                    <td class="px-4 py-2 border-b">{{ number_format($product->price, 0, ',', ' ') }} FCFA</td>
                    <td class="px-4 py-2 border-b">{{ $product->category->name ?? '-' }}</td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Modifier</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
