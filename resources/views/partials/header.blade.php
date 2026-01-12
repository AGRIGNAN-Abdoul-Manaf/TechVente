<nav class="flex justify-between items-center px-6 py-4 bg-white shadow-lg border-b border-gray-200 sticky top-0 z-50">
    
    <!-- Titre -->
    <div class="flex items-center gap-2">
        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 11V7h2v4H9zM9 13h2v2H9v-2z"/>
        </svg>
        <h4 class="text-gray-800 text-lg font-semibold">Tableau de bord</h4>
    </div>

    <!-- Bouton Déconnexion -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" 
                class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-lg shadow-sm transition transform hover:-translate-y-0.5 hover:scale-105">
            <i class="bi bi-box-arrow-right"></i> Déconnexion
        </button>
    </form>
</nav>
