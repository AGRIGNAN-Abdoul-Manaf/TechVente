@extends('layout')

@section('title', 'Créer une nouvelle vente')

@section('content')
<div class="max-w-4xl mx-auto mt-8">

    <h2 class="text-2xl font-bold mb-6 text-blue-700">Créer une nouvelle vente</h2>

    <!-- Affichage des erreurs -->
    @if ($errors->any())
        <div class="bg-red-600 text-white p-3 rounded-lg mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire -->
    <form action="{{ route('sales.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
        @csrf

        <!-- Client -->
        <div class="mb-5">
            <label for="client_id" class="block text-sm font-medium text-gray-700 mb-2">Client</label>
            <select id="client_id" name="client_id" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                <option value="">-- Sélectionner un client --</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Produits -->
        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-2">Produits</label>

            <div class="border border-gray-300 rounded-lg p-4 bg-gray-50">
                @foreach ($products as $product)
                    <div class="flex items-center justify-between bg-white p-3 mb-2 rounded-md border hover:shadow-sm transition">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="products[]" value="{{ $product->id }}" 
                                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                                {{ is_array(old('products')) && in_array($product->id, old('products')) ? 'checked' : '' }}>
                            <label class="font-medium text-gray-800">{{ $product->name }}</label>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="text-gray-600 text-sm">{{ number_format($product->price, 0, ',', ' ') }} FCFA</span>
                            <input type="number" name="quantities[{{ $product->id }}]" 
                                value="{{ old('quantities')[$product->id] ?? 1 }}" 
                                min="1"
                                class="w-20 border border-gray-300 rounded-lg p-1 text-center focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Mode de paiement -->
        <div class="mb-6">
            <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-2">Mode de paiement</label>
            <select id="payment_method" name="payment_method" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
                <option value="">-- Sélectionner le mode de paiement --</option>
                <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Espèces</option>
                <option value="card" {{ old('payment_method') == 'card' ? 'selected' : '' }}>Carte bancaire</option>
                <option value="mobile_money" {{ old('payment_method') == 'mobile_money' ? 'selected' : '' }}>Mobile Money</option>
            </select>
        </div>

        <!-- ✅ Date d'échéance -->
        <div class="mb-6">
            <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">Date d'échéance :</label>
            <input type="date" name="due_date" id="due_date"
                   value="{{ old('due_date') }}"
                   class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Bouton -->
        <div class="text-right">
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold transition">
                 Enregistrer la vente
            </button>
        </div>
    </form>
</div>
@endsection
