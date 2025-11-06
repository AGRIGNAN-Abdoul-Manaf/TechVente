{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechVente | Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="auth-body">

    <div class="auth-container">
        <div class="auth-card">
            <img src="{{ asset('images/logo.png') }}" alt="TechVente Logo" class="auth-logo">
            <h2> Create an Account</h2>

            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" name="name" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Choose a password" required>
                </div>

                <div class="form-group">
                    <label>Confirm Password:</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm password" required>
                </div>

                <button type="submit" class="btn-primary">Register</button>
            </form>

            <p class="switch-link">Already have an account? 
                <a href="{{ route('login') }}">Login</a>
            </p>
        </div>
    </div>

</body>
</html> --}}


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - TechVente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500 flex items-center justify-center">

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-2xl">
        <!-- Logo -->
        <div class="text-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo TechVente" class="w-20 h-20 mx-auto rounded-full mb-3">
            <h1 class="text-2xl font-bold text-gray-800">Créer un compte</h1>
            <p class="text-gray-500 text-sm">Rejoignez la plateforme TechVente</p>
        </div>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Nom -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                <input type="text" name="name" required
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
                <input type="email" name="email" required
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input type="password" name="password" required
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <!-- Bouton -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition">
                Créer mon compte
            </button>

            <!-- Lien vers connexion -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Vous avez déjà un compte ?
                <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">
                    Se connecter
                </a>
            </p>
        </form>
    </div>

</body>
</html>

