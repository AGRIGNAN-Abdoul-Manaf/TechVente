<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - TechVente</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="bg-gradient-to-b from-indigo-900 to-indigo-700 text-white w-64 flex flex-col justify-between shadow-xl transition-all duration-300">
        <div>
            <!-- Logo -->
            <div class="p-6 text-center border-b border-indigo-800">
                <a href="{{ route('dashboard') }}" class="block hover:opacity-90 transition">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="Logo TechVente" 
                         class="w-16 h-16 mx-auto mb-3 rounded-full border-2 border-white shadow-md">
                    <h1 class="text-2xl font-extrabold tracking-wide">TechVente</h1>
                </a>
                <p class="text-sm text-yellow-300 mt-1">Gestion simplifiée</p>
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
                       class="flex items-center px-6 py-3 rounded-lg transition duration-300
                              hover:bg-indigo-800 hover:pl-8 
                              {{ request()->routeIs($item['route']) ? 'bg-indigo-800 pl-8' : '' }}">
                        <i class="bi {{ $item['icon'] }} mr-3 text-lg"></i>
                        <span class="font-medium">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>
        </div>

        <!-- Logout -->
        <div class="p-6 border-t border-indigo-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg flex items-center justify-center gap-2 transition transform hover:scale-105">
                    <i class="bi bi-box-arrow-right"></i> Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1 flex flex-col">

        <!-- Header -->
        <header class="bg-white shadow-md sticky top-0 z-50 flex justify-between items-center px-8 py-4 border-b">
            <h2 class="text-2xl font-bold text-indigo-800">@yield('title')</h2>

            <!-- User Info -->
            <div class="flex items-center gap-3">
                <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-user.png') }}" 
                     alt="Profil" 
                     class="w-10 h-10 rounded-full border border-gray-300 object-cover shadow-sm">
                <div>
                    <p class="font-semibold">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </header>

        <!-- Content -->
        <section class="flex-1 p-8 bg-gray-50">
            @yield('content')
        </section>

        <!-- Footer -->
        <footer class="bg-white border-t text-center py-4 text-sm text-gray-500">
            © {{ date('Y') }} <span class="font-semibold text-indigo-700">TechVente</span>. Tous droits réservés.
        </footer>

    </main>
</div>

</body>
</html>
