@extends('layouts.app')

@section('title', "Historique d'achats de $client->name")

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">
        Historique d'achats de <span class="text-blue-600">{{ $client->name }}</span>
    </h2>

    @if($sales->isEmpty())
        <p class="text-gray-600">Aucune vente enregistrée pour ce client.</p>
    @else
        <table class="w-full border-collapse bg-white rounded-lg overflow-hidden shadow-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Date</th>
                    <th class="py-3 px-4 text-left">Produits</th>
                    <th class="py-3 px-4 text-left">Montant total</th>
                    <th class="py-3 px-4 text-left">Mode de paiement</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse($sale->sale_date)->format('d/m/Y H:i') }}</td>
                        <td class="py-3 px-4">
                            <ul class="list-disc list-inside">
                                @foreach ($sale->orderLines as $line)
                                    <li>{{ $line->product->name }} (x{{ $line->quantity }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="py-3 px-4 font-semibold text-gray-700">{{ number_format($sale->total_amount, 0, ',', ' ') }} FCFA</td>
                        <td class="py-3 px-4 capitalize">{{ $sale->payment_method }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mt-6">
        <a href="{{ route('clients.index') }}" 
           class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
           ← Retour à la liste des clients
        </a>
    </div>
</div>
@endsection
