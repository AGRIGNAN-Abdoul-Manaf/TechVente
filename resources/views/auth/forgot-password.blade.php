<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié - TechVente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md bg-white shadow-xl p-8 rounded-2xl">
    
    <div class="text-center mb-4">
        <img src="{{ asset('images/logo.png') }}" class="w-20 mx-auto mb-3" alt="TechVente Logo">
        <h2 class="text-2xl font-bold text-gray-700">Mot de passe oublié</h2>
        <p class="text-gray-500 text-sm mt-1">Entrez votre email pour recevoir un lien</p>
    </div>

    @if (session('status'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded mb-4 text-sm">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label class="font-semibold text-gray-600">Adresse e-mail</label>
        <div class="relative mb-4 mt-1">

            <input type="email" name="email" required
                   class="w-full p-3 pl-10 border rounded-lg focus:ring-2 focus:ring-blue-400">

            <span class="absolute left-3 top-3 text-gray-400">
                
            </span>
        </div>

        @error('email')
            <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
        @enderror

        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg text-lg">
            Envoyer le lien
        </button>
    </form>

    <p class="text-center mt-4 text-sm">
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
            Retour à la connexion
        </a>
    </p>

</div>

</body>
</html>
