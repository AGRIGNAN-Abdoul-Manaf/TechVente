<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialiser le mot de passe - TechVente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md bg-white shadow-xl p-8 rounded-2xl">

    <div class="text-center mb-4">
        <img src="{{ asset('images/logo.png') }}" class="w-20 mx-auto mb-3" alt="TechVente Logo">
        <h2 class="text-2xl font-bold text-gray-700">Réinitialiser le mot de passe</h2>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <label class="text-gray-600 font-semibold">Adresse e-mail</label>
        <input type="email" name="email" value="{{ request()->email }}"
               class="w-full p-3 border rounded-lg mb-3 mt-1"
               required>

        <label class="text-gray-600 font-semibold">Nouveau mot de passe</label>
        <input type="password" name="password"
               class="w-full p-3 border rounded-lg mb-3 mt-1"
               required>

        <label class="text-gray-600 font-semibold">Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation"
               class="w-full p-3 border rounded-lg mb-3 mt-1"
               required>

        @error('password')
            <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
        @enderror

        <button class="w-full bg-green-600 hover:bg-green-700 text-white p-3 mt-2 rounded-lg text-lg">
            Réinitialiser
        </button>
    </form>

</div>

</body>
</html>
