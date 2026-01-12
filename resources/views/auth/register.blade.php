<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - TechVente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center 
             bg-gradient-to-br from-indigo-900 via-purple-800 to-blue-700 px-4">

    <!-- Card -->
    <div class="w-full max-w-md bg-white/95 backdrop-blur-lg 
                rounded-2xl shadow-2xl p-8 md:p-10">

        <!-- Logo -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.png') }}" 
                 alt="Logo TechVente"
                 class="w-20 h-20 mx-auto rounded-full shadow-lg mb-4">
            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-800">
                Créer un compte
            </h1>
            <p class="text-gray-500 text-sm mt-1">
                Rejoignez la plateforme TechVente
            </p>
        </div>

        <!-- Erreurs -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 
                        p-3 rounded-lg mb-4 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Nom -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nom complet
                </label>
                <input type="text" name="name" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                           focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                           outline-none transition">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Adresse e-mail
                </label>
                <input type="email" name="email" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                           focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                           outline-none transition">
            </div>

            <!-- Téléphone -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Numéro de téléphone
                </label>
                <input type="text" name="phone" placeholder="+228 90 00 00 00" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                           focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                           outline-none transition">
            </div>

            <!-- Mot de passe -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Mot de passe
                </label>
                <input type="password" name="password" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                           focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                           outline-none transition">
            </div>

            <!-- Confirmation -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Confirmer le mot de passe
                </label>
                <input type="password" name="password_confirmation" required
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm
                           focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                           outline-none transition">
            </div>

            <!-- Bouton -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-indigo-600 to-purple-600
                       hover:from-indigo-700 hover:to-purple-700
                       text-white font-bold py-3 rounded-xl shadow-lg
                       transition transform hover:-translate-y-0.5">
                Créer mon compte
            </button>

            <!-- Lien connexion -->
            <p class="text-center text-sm text-gray-600 pt-4">
                Vous avez déjà un compte ?
                <a href="{{ route('login') }}"
                   class="text-indigo-600 font-semibold hover:underline">
                    Se connecter
                </a>
            </p>
        </form>
    </div>

</body>
</html>
