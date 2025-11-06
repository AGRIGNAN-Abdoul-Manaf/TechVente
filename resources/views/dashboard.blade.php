@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')


    {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Produits</h2>
            <p class="text-gray-600 mb-4">Gérez vos produits disponibles en stock.</p>
            <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Voir</a>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Clients</h2>
            <p class="text-gray-600 mb-4">Liste et gestion de vos clients.</p>
            <a href="{{ route('clients.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Voir</a>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Ventes</h2>
            <p class="text-gray-600 mb-4">Suivez et créez de nouvelles ventes.</p>
            <a href="{{ route('sales.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Voir</a>
        </div>
    </div> --}}

    {{-- <div class="mt-10">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">🚪 Se déconnecter</button>
        </form>
    </div>
</div>
 --}}


{{-- @endsection


@extends('layouts.app') --}}

{{-- @extends('layouts.app') --}}



{{-- @section('title', 'Accueil')

@section('content')

<!-- SECTION HERO (bannière principale) -->
<section class="relative bg-cover bg-center h-[80vh] flex items-center justify-center text-white" 
    style="background-image: url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1350&q=80');">
    <div class="bg-black bg-opacity-60 absolute inset-0"></div>
    <div class="relative text-center z-10 px-6">
        <h1 class="text-5xl font-extrabold mb-4">Gérez votre entreprise avec <span class="text-sky-400">TechVente</span></h1>
        <p class="text-lg mb-6">Simplifiez la gestion de vos produits, clients et ventes avec une interface moderne et intuitive.</p>
        <a href="{{ route('products.index') }}" class="bg-sky-500 hover:bg-sky-600 text-white px-6 py-3 rounded-lg font-semibold transition">
            Commencer maintenant
        </a>
    </div>
</section>

<!-- SECTION AVANTAGES -->
<section class="py-16 bg-gray-100 text-center">
    <h2 class="text-3xl font-bold mb-10">Pourquoi choisir <span class="text-sky-500">TechVente</span> ?</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-8 max-w-6xl mx-auto">
        <div class="bg-white shadow-lg p-6 rounded-2xl hover:shadow-2xl transition">
            <img src="https://cdn-icons-png.flaticon.com/512/3208/3208707.png" class="w-16 mx-auto mb-4" alt="Facile à utiliser">
            <h3 class="text-xl font-semibold mb-2">Facile à utiliser</h3>
            <p>Une interface intuitive qui vous permet de gérer tout en quelques clics sans effort.</p>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-2xl hover:shadow-2xl transition">
            <img src="https://cdn-icons-png.flaticon.com/512/4213/4213925.png" class="w-16 mx-auto mb-4" alt="Statistiques">
            <h3 class="text-xl font-semibold mb-2">Statistiques en temps réel</h3>
            <p>Obtenez des rapports détaillés sur vos ventes et vos performances commerciales.</p>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-2xl hover:shadow-2xl transition">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" class="w-16 mx-auto mb-4" alt="Sécurité">
            <h3 class="text-xl font-semibold mb-2">Données sécurisées</h3>
            <p>Vos informations sont protégées grâce à des technologies de sécurité avancées.</p>
        </div>
    </div>
</section>

<!-- SECTION ILLUSTRATION PRODUIT -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center px-6">
        <div class="md:w-1/2 mb-10 md:mb-0">
            <h2 class="text-3xl font-bold mb-4 text-gray-800">Un tableau de bord complet</h2>
            <p class="text-gray-600 mb-6">
                Visualisez toutes vos activités en un coup d'œil : ventes, produits, clients et statistiques.
                Gagnez du temps et améliorez votre productivité avec TechVente.
            </p>
            <a href="{{ route('products.index') }}" class="bg-sky-500 hover:bg-sky-600 text-white px-5 py-3 rounded-lg transition">Voir le tableau de bord</a>
        </div>
        <div class="md:w-1/2 flex justify-center">
            <img src="https://cdn.dribbble.com/users/2238041/screenshots/15469418/media/f3a47c325e93df8e93d11f8473340aa0.png?compress=1&resize=800x600" 
                 alt="Dashboard" class="rounded-2xl shadow-xl">
        </div>
    </div>
</section>

<!-- SECTION CTA -->
<section class="bg-sky-600 text-white py-16 text-center">
    <h2 class="text-3xl font-bold mb-4">Rejoignez la révolution TechVente</h2>
    <p class="mb-6 text-lg">Profitez d'une solution tout-en-un pour booster vos ventes et votre efficacité.</p>
    <a href="{{ route('register') }}" class="bg-white text-sky-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition">
        Créer un compte
    </a>
</section>

@endsection



<style>
    /* === PAGE D’ACCUEIL (ACCUEIL AVEC IMAGES) === */

.hero-section {
    position: relative;
    height: 80vh;
    background-image: url('https://images.unsplash.com/photo-1557821552-17105176677c?auto=format&fit=crop&w=1400&q=80');
    background-size: cover;
    background-position: center;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 60px;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.55);
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.hero-content h1 {
    font-size: 3rem;
    color: #fff;
    margin-bottom: 15px;
}

.hero-content h1 span {
    color: #38bdf8;
}

.hero-content p {
    color: #e0f2fe;
    font-size: 1.2rem;
    margin-bottom: 25px;
}

.btn-main {
    background: linear-gradient(to right, #38bdf8, #0284c7);
    color: white;
    padding: 12px 25px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: background 0.3s;
}

.btn-main:hover {
    background: linear-gradient(to right, #0ea5e9, #0369a1);
}

/* === FEATURES SECTION === */
.features {
    padding: 60px 20px;
    text-align: center;
}

.section-title {
    font-size: 2rem;
    font-weight: bold;
    color: #0f172a;
    margin-bottom: 40px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    justify-content: center;
    align-items: stretch;
}

.feature-card {
    background: white;
    border-radius: 12px;
    padding: 25px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.feature-card img {
    width: 80px;
    height: 80px;
    margin-bottom: 15px;
}

.feature-card h3 {
    color: #0284c7;
    margin-bottom: 8px;
    font-size: 1.3rem;
}

.feature-card p {
    color: #555;
    font-size: 0.95rem;
}

/* === CTA SECTION === */
.cta-section {
    background: linear-gradient(to right, #0ea5e9, #0284c7);
    color: white;
    text-align: center;
    padding: 60px 20px;
    border-radius: 12px;
    margin: 60px 0;
}

.cta-section h2 {
    font-size: 2rem;
    margin-bottom: 10px;
}

.cta-section h2 span {
    color: #ffd700;
}

.cta-section p {
    font-size: 1.1rem;
    margin-bottom: 20px;
}

</style> --}}


{{-- @extends('layouts.app') --}}



@section('title', 'Accueil')

@section('content')

<!-- === SECTION HERO === -->
<section class="relative bg-cover bg-center h-[80vh] flex items-center justify-center text-white" 
    style="background-image: url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1350&q=80');">
    
    <div class="bg-black bg-opacity-60 absolute inset-0"></div>
    <div class="relative text-center z-10 px-6">
        <h1 class="text-5xl font-extrabold mb-4">
            Bienvenue sur <span class="text-sky-400">TechVente</span>
        </h1>
        <p class="text-lg mb-8">
            Gérez facilement vos <strong>produits</strong>, <strong>clients</strong> et <strong>ventes</strong> 
            avec une plateforme moderne et intuitive.
        </p>

        <!-- 🔘 Boutons de navigation rapide -->
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('products.index') }}" 
               class="bg-sky-500 hover:bg-sky-600 text-white px-6 py-3 rounded-lg font-semibold transition shadow-md">
                 Produits
            </a>

            <a href="{{ route('clients.index') }}" 
               class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold transition shadow-md">
                 Clients
            </a>

            <a href="{{ route('sales.index') }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg font-semibold transition shadow-md">
                 Ventes
            </a>

            <a href="{{ route('reports.index') }}" 
               class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold transition shadow-md">
                 Rapports
            </a>
        </div>
    </div>
</section>

<!-- === SECTION AVANTAGES === -->
<section class="py-16 bg-gray-100 text-center">
    <h2 class="text-3xl font-bold mb-10">
        Pourquoi choisir <span class="text-sky-500">TechVente</span> ?
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-8 max-w-6xl mx-auto">
        <div class="bg-white shadow-lg p-6 rounded-2xl hover:shadow-2xl transition">
            <img src="https://cdn-icons-png.flaticon.com/512/3208/3208707.png" class="w-16 mx-auto mb-4" alt="Facile à utiliser">
            <h3 class="text-xl font-semibold mb-2">Facile à utiliser</h3>
            <p>Une interface intuitive qui vous permet de gérer tout en quelques clics sans effort.</p>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-2xl hover:shadow-2xl transition">
            <img src="https://cdn-icons-png.flaticon.com/512/4213/4213925.png" class="w-16 mx-auto mb-4" alt="Statistiques">
            <h3 class="text-xl font-semibold mb-2">Statistiques en temps réel</h3>
            <p>Obtenez des rapports détaillés sur vos ventes et vos performances commerciales.</p>
        </div>
        <div class="bg-white shadow-lg p-6 rounded-2xl hover:shadow-2xl transition">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" class="w-16 mx-auto mb-4" alt="Sécurité">
            <h3 class="text-xl font-semibold mb-2">Données sécurisées</h3>
            <p>Vos informations sont protégées grâce à des technologies de sécurité avancées.</p>
        </div>
    </div>
</section>

<!-- === SECTION ILLUSTRATION === -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center px-6">
        <div class="md:w-1/2 mb-10 md:mb-0">
            <h2 class="text-3xl font-bold mb-4 text-gray-800">Un tableau de bord complet</h2>
            <p class="text-gray-600 mb-6">
                Visualisez toutes vos activités en un coup d'œil : ventes, produits, clients et statistiques.
                Gagnez du temps et améliorez votre productivité avec TechVente.
            </p>
            <a href="{{ route('dashboard') }}" 
               class="bg-sky-500 hover:bg-sky-600 text-white px-5 py-3 rounded-lg transition shadow-md">
                Voir le tableau de bord
            </a>
        </div>
        <div class="md:w-1/2 flex justify-center">
           <img src="{{ asset('images/logo.png') }}" 
     alt="Logo TechVente" 
     class="w-25 h-20 mx-auto mb-4 rounded-full border-4 border-sky-500 shadow-xl">

        </div>
    </div>
</section>

<!-- === SECTION CTA === -->
<section class="bg-sky-600 text-white py-16 text-center">
    <h2 class="text-3xl font-bold mb-4">Rejoignez la révolution TechVente</h2>
    <p class="mb-6 text-lg">Profitez d'une solution tout-en-un pour booster vos ventes et votre efficacité.</p>
    <a href="{{ route('register') }}" 
       class="bg-white text-sky-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition shadow-md">
        Créer un compte
    </a>
</section>

@endsection
