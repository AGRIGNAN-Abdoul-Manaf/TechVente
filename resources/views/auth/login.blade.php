{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechVente | Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="auth-body">

    <div class="auth-container">
        <div class="auth-card">
            <img src="{{ asset('images/logo.png') }}" alt="TechVente Logo" class="auth-logo">
            <h2> Login</h2>

            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn-primary">Login</button>
            </form>

            <p class="switch-link">Don't have an account? 
                <a href="{{ route('register') }}">Register</a>
            </p>
        </div>
    </div>

</body>
</html>

<style>
    
</style> --}}


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexions - TechVente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500 flex items-center justify-center">

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-2xl">
        <!-- Logo -->
        <div class="text-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo TechVente" class="w-20 h-20 mx-auto rounded-full mb-3">
            <h1 class="text-2xl font-bold text-gray-800">Connexion</h1>
            <p class="text-gray-500 text-sm">Connectez-vous à votre compte TechVente</p>
        </div>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
                <input type="email" name="email" required autofocus
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input type="password" name="password" required
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
''
            <!-- Remember -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2 accent-blue-600">
                    Se souvenir de moi
                </label>
                <a href="#" class="text-blue-600 hover:underline">Mot de passe oublié ?</a>
            </div>

            <!-- Bouton -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition">
                Se connecter
            </button>

            <!-- Lien vers l'inscription -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:underline">
                    Créez un compte
                </a>
            </p>
        </form>
    </div>

</body>
</html>

