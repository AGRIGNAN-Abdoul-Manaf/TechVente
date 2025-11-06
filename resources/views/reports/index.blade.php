@extends('layouts.app')

@section('content')
<div class="container mt-4">
    
    <h2 class="mb-4"> Rapports des ventes</h2>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Total des ventes</h5>
                    <h3>{{ number_format($totalVentes, 0, ',', ' ') }} FCFA</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Nombre de ventes</h5>
                    <h3>{{ $nombreVentes }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Paiement en espèce</h5>
                    <h3>{{ number_format($paiementCash, 0, ',', ' ') }} FCFA</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Paiement mobile</h5>
                    <h3>{{ number_format($paiementMobile, 0, ',', ' ') }} FCFA</h3>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mt-4"> Meilleurs produits vendus</h4>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Produit</th>
                <th>Quantité vendue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produitsTop as $p)
                <tr>
                    <td>{{ $p->product->name }}</td>
                    <td>{{ $p->total_vendu }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-4"> Ventes récentes</h4>
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Client</th>
                <th>Montant total</th>
                <th>Méthode de paiement</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventesRecentes as $vente)
                <tr>
                    <td>{{ $vente->client->name ?? 'N/A' }}</td>
                    <td>{{ number_format($vente->total_amount, 0, ',', ' ') }} FCFA</td>
                    <td>{{ ucfirst($vente->payment_method) }}</td>
                    <td>{{ \Carbon\Carbon::parse($vente->sale_date)->format('d/m/Y H:i') }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <footer class="text-center mt-5 text-muted">
        © 2025 TechVente. Tous droits réservés.
    </footer>
</div>
@endsection
