@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <!-- Header / Welcome -->
    <div class="text-center mb-5">
        <h1 class="display-4">Bienvenue sur <span class="text-primary">TechVente</span></h1>
        <p class="lead">Gérez facilement vos produits, clients et ventes avec une plateforme moderne et intuitive.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg mt-3">Voir le tableau de bord</a>
    </div>

    <!-- Cards Section -->
    <div class="row text-center mb-5">
        <div class="col-md-3 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Produits</h5>
                    <p class="card-text">Ajoutez, modifiez ou supprimez vos produits facilement.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-primary">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Clients</h5>
                    <p class="card-text">Consultez et gérez vos clients en toute simplicité.</p>
                    <a href="{{ route('clients.index') }}" class="btn btn-outline-primary">Gérer</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Ventes</h5>
                    <p class="card-text">Suivez vos ventes et générez des reçus rapidement.</p>
                    <a href="{{ route('sales.index') }}" class="btn btn-outline-primary">Voir</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Rapports</h5>
                    <p class="card-text">Analysez vos performances grâce à des statistiques en temps réel.</p>
                    <a href="{{ route('reports.index') }}" class="btn btn-outline-primary">Voir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Why TechVente Section -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ asset('images/dashboard.svg') }}" alt="TechVente Illustration" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Pourquoi choisir <span class="text-primary">TechVente</span> ?</h2>
            <ul class="list-unstyled mt-3">
                <li class="mb-2"><strong>Facile à utiliser :</strong> Une interface intuitive pour gérer tout en quelques clics.</li>
                <li class="mb-2"><strong>Statistiques :</strong> Obtenez des rapports détaillés sur vos ventes et performances.</li>
                <li class="mb-2"><strong>Sécurité :</strong> Vos données sont protégées avec les dernières technologies.</li>
                <li class="mb-2"><strong>Tableau de bord complet :</strong> Visualisez toutes vos activités en un coup d'œil.</li>
            </ul>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center my-5">
        <h2>Rejoignez la révolution <span class="text-primary">TechVente</span></h2>
        <p>Profitez d'une solution tout-en-un pour booster vos ventes et votre efficacité.</p>
        <a href="{{ route('register') }}" class="btn btn-success btn-lg">Créer un compte</a>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 mb-3">
        <p>© 2026 TechVente. Tous droits réservés.</p>
    </footer>
</div>
@endsection
