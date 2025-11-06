<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - TechVente</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Icônes Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Structure principale -->
    <div class="flex min-h-screen">

        <!-- 🟦 Barre latérale -->
        <aside class="bg-gradient-to-b from-blue-900 to-blue-700 text-white w-64 flex flex-col justify-between shadow-lg">
            <div>
                <!-- Logo -->
                <div class="p-6 text-center border-b border-blue-800">
    <a href="{{ route('dashboard') }}" class="block hover:opacity-90 transition">
        <img src="{{ asset('images/logo.png') }}" 
             alt="Logo TechVente" 
             class="w-16 h-16 mx-auto mb-3 rounded-full border-2 border-white shadow-md">
        <h1 class="text-xl font-extrabold tracking-wide">TechVente</h1>
    </a>
     <p class="text-sm text-blue-200 mt-1">Gestion simplifiée</p>
</div>

                <!-- Menu -->
                <nav class="mt-8 space-y-1">
                    @php
                        $menu = [
                            ['route' => 'dashboard', 'icon' => 'bi-speedometer2', 'label' => 'Tableau de bord'],
                            ['route' => 'clients.index', 'icon' => 'bi-people-fill', 'label' => 'Clients'],
                            ['route' => 'products.index', 'icon' => 'bi-box-seam', 'label' => 'Produits'],
                            ['route' => 'sales.index', 'icon' => 'bi-cash-coin', 'label' => 'Ventes'],
                            ['route' => 'reports.index', 'icon' => 'bi-bar-chart-line', 'label' => 'Rapports'],
                            ['route' => 'profile.edit', 'icon' => 'bi-person-circle', 'label' => 'Profil'],
                        ];
                    @endphp

                    @foreach($menu as $item)
                        <a href="{{ route($item['route']) }}" 
                           class="flex items-center px-6 py-3 rounded-md transition duration-300
                                  hover:bg-blue-800 hover:pl-7 
                                  {{ request()->routeIs($item['route']) ? 'bg-blue-800 pl-7' : '' }}">
                            <i class="bi {{ $item['icon'] }} mr-3 text-lg"></i>
                            <span class="font-medium">{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>

            <!-- Déconnexion -->
            <div class="p-6 border-t border-blue-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                        <i class="bi bi-box-arrow-right mr-2"></i> Déconnexion
                    </button>
                </form>
            </div>
        </aside>

        <!-- 🟨 Contenu principal -->
        <main class="flex-1 flex flex-col">

            <!-- En-tête fixe -->
            <header class="bg-white shadow-sm sticky top-0 z-10 flex justify-between items-center px-8 py-4 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">@yield('title')</h2>

                <!-- Petit menu utilisateur -->
                <div class="flex items-center gap-3">
                    <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-user.png') }}" 
                         alt="Profil" 
                         class="w-10 h-10 rounded-full border border-gray-300 object-cover">
                    <div>
                        <p class="font-semibold">{{ Auth::user()->name }}</p>
                        <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </header>

            <!-- Contenu -->
            <section class="flex-1 p-8">
                @yield('content')
            </section>

            <!-- Pied de page -->
            <footer class="bg-white border-t text-center py-4 text-sm text-gray-500">
                © 2025 <span class="font-semibold text-blue-700">TechVente</span>. Tous droits réservés.
            </footer>
        </main>
    </div>

</body>
</html>
