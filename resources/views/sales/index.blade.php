@extends('layout')

@section('title', 'Ventes')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold text-yellow-700 mb-4">Liste des Ventes</h1>

    <a href="{{ route('sales.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-green-600">+ Ajouter une vente</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Produits</th>
                    <th class="px-4 py-2 border-b">Client</th>
                    <th class="px-4 py-2 border-b">Montant total</th>
                    <th class="px-4 py-2 border-b">Date</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $sale->id }}</td>
                    <td class="px-4 py-2 border-b">
                        @foreach($sale->orderLines as $line)
                            <span>{{ $line->product->name }} (x{{ $line->quantity }})</span><br>
                        @endforeach
                    </td>
                    <td class="px-4 py-2 border-b">{{ $sale->client->name ?? '-' }}</td>
                    <td class="px-4 py-2 border-b">{{ number_format($sale->total_amount, 0, ',', ' ') }} FCFA</td>
                    <td class="px-4 py-2 border-b">{{ $sale->sale_date->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('sales.edit', $sale->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Modifier</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="return confirm('Supprimer cette vente ?')">Supprimer</button>
                           <a href="{{ route('sales.receipt', $sale->id) }}" 
   target="_blank"
   class="inline-block bg-green-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-green-700 hover:scale-105 transition-all duration-200">
    Imprimer Reçu
</a>



                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
