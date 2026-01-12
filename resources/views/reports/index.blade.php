@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <!-- Titre de la page -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">Rapports des ventes</h2>
        <p class="text-muted">Suivez facilement vos ventes, produits et paiements</p>
    </div>
    </div>

     <a href="{{ route('sales.index') }}" class="btn btn-back-sales">
        ⬅ Retour à la liste des ventes
    </a>
</div>

    <!-- Statistiques -->
    <div class="row g-4 mb-5">
        <div class="col-md-3 col-sm-6">
            <div class="card text-center shadow border-0 rounded-lg stats-card" style="background: linear-gradient(135deg, #10b981, #34d399); color:white;">
                <div class="card-body">
                    <h5>Total des ventes</h5>
                    <h3>{{ number_format($totalVentes, 0, ',', ' ') }} FCFA</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center shadow border-0 rounded-lg stats-card" style="background: linear-gradient(135deg, #3b82f6, #60a5fa); color:white;">
                <div class="card-body">
                    <h5>Nombre de ventes</h5>
                    <h3>{{ $nombreVentes }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center shadow border-0 rounded-lg stats-card" style="background: linear-gradient(135deg, #facc15, #fde047); color:white;">
                <div class="card-body">
                    <h5>Paiement en espèce</h5>
                    <h3>{{ number_format($paiementCash, 0, ',', ' ') }} FCFA</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card text-center shadow border-0 rounded-lg stats-card" style="background: linear-gradient(135deg, #06b6d4, #22d3ee); color:white;">
                <div class="card-body">
                    <h5>Paiement mobile</h5>
                    <h3>{{ number_format($paiementMobile, 0, ',', ' ') }} FCFA</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Meilleurs produits -->
    <div class="mb-5">
        <h4 class="mb-3 text-secondary fw-semibold">Meilleurs produits vendus</h4>
        <div class="table-responsive shadow rounded">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
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
        </div>
    </div>

    <!-- Ventes récentes -->
    <div class="mb-5">
        <h4 class="mb-3 text-secondary fw-semibold">Ventes récentes</h4>
        <div class="table-responsive shadow rounded">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
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
        </div>
    </div>

    

</div>
@endsection

@section('styles')
<style>
    /* Cartes statistiques */
    .stats-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(27, 18, 18, 0.5);
    }

    .stats-card h5 {
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }
    .stats-card h3 {
        font-weight: 700;
        font-size: 1.4rem;
    }

    /* Hover pour les tables */
    table tbody tr:hover {
        background-color: #012741;
        transition: 0.3s;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .stats-card h3 {
            font-size: 1.2rem;
        }
        .stats-card h5 {
            font-size: 0.85rem;
        }
    }

    /* Bouton retour */
.btn-back {
    border-radius: 30px;
    padding: 8px 18px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-back:hover {
    background-color: #0d6efd;
    color: #fff;
    transform: translateX(-4px);
}

</style>
@endsection
