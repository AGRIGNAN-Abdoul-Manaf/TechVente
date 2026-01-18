@extends('layout')

@section('title', 'Rapports')

@section('content')
<div class="container mx-auto">
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-indigo-900">Rapports & Statistiques</h1>
        
        <!-- Filtre par date -->
        <form method="GET" action="{{ route('reports.index') }}" class="flex flex-col md:flex-row gap-2 items-center bg-white p-2 rounded-lg shadow-sm border mt-4 md:mt-0">
            <div class="flex items-center gap-2">
                <label class="text-sm font-semibold text-gray-600">Du :</label>
                <input type="date" name="start_date" value="{{ $startDate }}" 
                       class="border rounded px-2 py-1 text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <div class="flex items-center gap-2">
                <label class="text-sm font-semibold text-gray-600">Au :</label>
                <input type="date" name="end_date" value="{{ $endDate }}" 
                       class="border rounded px-2 py-1 text-sm focus:outline-none focus:border-indigo-500">
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-1 rounded text-sm hover:bg-indigo-700 transition">
                Filtrer
            </button>
        </form>
    </div>

    <!-- Période affichée -->
    <p class="text-gray-500 text-sm mb-6">
        Période du <span class="font-semibold">{{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}</span> 
        au <span class="font-semibold">{{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</span>
    </p>

    <!-- Cartes Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Ventes -->
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-emerald-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Chiffre d'affaires</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ number_format($totalVentes, 0, ',', ' ') }} <span class="text-xs text-gray-400">FCFA</span></h3>
                </div>
                <div class="p-2 bg-emerald-100 rounded-lg text-emerald-600">
                    <i class="bi bi-cash-stack text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Nombre Ventes -->
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Ventes</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $nombreVentes }}</h3>
                </div>
                <div class="p-2 bg-blue-100 rounded-lg text-blue-600">
                    <i class="bi bi-cart-check text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Panier Moyen (Calculé) -->
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-indigo-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Panier Moyen</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $nombreVentes > 0 ? number_format($totalVentes / $nombreVentes, 0, ',', ' ') : 0 }} <span class="text-xs text-gray-400">FCFA</span>
                    </h3>
                </div>
                <div class="p-2 bg-indigo-100 rounded-lg text-indigo-600">
                    <i class="bi bi-bag text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Meilleur Produit (Top 1) -->
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-amber-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Top Produit</p>
                    <h3 class="text-xl font-bold text-gray-800 mt-1 truncate w-40" title="{{ $produitsTop->first()->product->name ?? '-' }}">
                        {{ $produitsTop->first()->product->name ?? '-' }}
                    </h3>
                </div>
                <div class="p-2 bg-amber-100 rounded-lg text-amber-600">
                    <i class="bi bi-trophy text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphique et Top Produits -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        
        <!-- Graphique d'évolution -->
        <div class="bg-white p-6 rounded-xl shadow-md lg:col-span-2">
            <h4 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2">Évolution des ventes (journalier)</h4>
            <div class="relative h-72 w-full">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Méthodes de paiement (Camembert ou Liste) -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h4 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2">Répartition Paiements</h4>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <span class="text-gray-600">Espèces</span>
                    </div>
                    <span class="font-bold">{{ number_format($paiementCash, 0, ',', ' ') }} FCFA</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                        <span class="text-gray-600">Carte Bancaire</span>
                    </div>
                    <span class="font-bold">{{ number_format($paiementCarte, 0, ',', ' ') }} FCFA</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <span class="text-gray-600">Mobile Money</span>
                    </div>
                    <span class="font-bold">{{ number_format($paiementMobile, 0, ',', ' ') }} FCFA</span>
                </div>
            </div>
            
            <!-- Mini Chart Donut pour le fun -->
            <div class="mt-6 h-40 flex justify-center">
                <canvas id="paymentChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Top 5 Produits & Dernières Ventes -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Top 5 Produits -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h4 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2"> Top 5 Produits vendus</h4>
            <table class="w-full text-left border-collapse">
                <tbody>
                    @forelse($produitsTop as $index => $item)
                    <tr class="border-b last:border-0 hover:bg-gray-50">
                        <td class="py-3 px-2">
                            <span class="bg-gray-200 text-gray-700 text-xs font-bold px-2 py-1 rounded-full">#{{ $index + 1 }}</span>
                        </td>
                        <td class="py-3 px-2 font-medium text-gray-800">{{ $item->product->name }}</td>
                        <td class="py-3 px-2 text-right font-bold text-indigo-600">{{ $item->total_vendu }} ventes</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-500 italic">Aucune donnée sur cette période.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Dernières Ventes -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h4 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2"> Dernières transactions</h4>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                        <tr>
                            <th class="py-2 px-3">Date</th>
                            <th class="py-2 px-3">Client</th>
                            <th class="py-2 px-3 text-right">Montant</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse($ventesRecentes as $sale)
                        <tr class="border-b last:border-0 hover:bg-gray-50">
                            <td class="py-3 px-3">{{ \Carbon\Carbon::parse($sale->sale_date)->format('d/m H:i') }}</td>
                            <td class="py-3 px-3">{{ $sale->client->name ?? 'Anonyme' }}</td>
                            <td class="py-3 px-3 text-right font-bold text-green-600">{{ number_format($sale->total_amount, 0, ',', ' ') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-500 italic">Aucune vente récente.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4 text-right">
                <a href="{{ route('sales.index') }}" class="text-sm text-indigo-600 hover:underline">Voir toutes les ventes →</a>
            </div>
        </div>

    </div>

</div>

<!-- Scripts Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // --- Graphique Évolution Ventes ---
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Chiffre d\'affaires (FCFA)',
                data: @json($chartValues),
                backgroundColor: 'rgba(79, 70, 229, 0.1)', // Indigo 500
                borderColor: 'rgba(79, 70, 229, 1)',
                borderWidth: 2,
                tension: 0.3,
                fill: true,
                pointBackgroundColor: '#fff',
                pointBorderColor: 'rgba(79, 70, 229, 1)',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { borderDash: [2, 4] }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });

    // --- Graphique Répartition Paiements ---
    const ctxPayment = document.getElementById('paymentChart').getContext('2d');
    const paymentChart = new Chart(ctxPayment, {
        type: 'doughnut',
        data: {
            labels: ['Espèces', 'Carte', 'Mobile Money'],
            datasets: [{
                data: [{{ $paiementCash }}, {{ $paiementCarte }}, {{ $paiementMobile }}],
                backgroundColor: [
                    '#10b981', // Espèces (Green)
                    '#3b82f6', // Carte (Blue)
                    '#f59e0b'  // Mobile (Yellow)
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            cutout: '70%',
        }
    });
</script>
@endsection
