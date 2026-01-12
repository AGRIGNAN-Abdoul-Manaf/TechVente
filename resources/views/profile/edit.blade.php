@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-12 px-4 sm:px-6 lg:px-8">

    <!-- Card principale -->
    <div class="bg-gradient-to-br from-sky-50 to-sky-100 shadow-2xl rounded-3xl p-8">

        <!-- Titre -->
        <h2 class="text-3xl font-extrabold text-center text-sky-600 mb-6">Mon Profil</h2>

        <!-- Photo profil + stats -->
        <div class="flex flex-col items-center mb-8">
            <div class="relative group">
                <img src="{{ $user->profile_picture 
                            ? asset('storage/' . $user->profile_picture) 
                            : 'https://via.placeholder.com/120' }}" 
                     alt="Photo de profil"
                     class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-xl transition-transform duration-300 group-hover:scale-105">

                <!-- Bouton édition -->
                <div class="absolute bottom-0 right-0 bg-sky-600 text-white rounded-full p-2 shadow-lg cursor-pointer hover:bg-sky-700 transition">
                    
                </div>
            </div>

            <!-- Nom & email -->
            <p class="mt-3 text-xl font-bold text-gray-800">{{ $user->name }}</p>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>

            <!-- Mini stats -->
            <div class="mt-6 grid grid-cols-2 gap-4 w-full">
                {{-- <div class="bg-white p-4 rounded-2xl shadow text-center">
                    <p class="text-gray-500 text-sm">Ventes</p>
                    <p class="text-lg font-bold text-sky-600">{{ $nombreVentes ?? 0 }}</p>
                </div>
                <div class="bg-white p-4 rounded-2xl shadow text-center">
                    <p class="text-gray-500 text-sm">Total vendu</p>
                    <p class="text-lg font-bold text-green-600">{{ number_format($totalVentes ?? 0, 0, ',', ' ') }} FCFA</p>
                </div> --}}
            </div>
        </div>

        <!-- Formulaire mise à jour -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Changer photo -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Changer la photo :</label>
                <input type="file" name="profile_picture" accept="image/*"
                       class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-sky-400 focus:outline-none transition shadow-sm">
            </div>

            <!-- Nom -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nom :</label>
                <input type="text" name="name" value="{{ $user->name }}"
                       class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-sky-400 focus:outline-none transition shadow-sm">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Email :</label>
                <input type="email" name="email" value="{{ $user->email }}"
                       class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-sky-400 focus:outline-none transition shadow-sm">
            </div>

            <!-- Mot de passe -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nouveau mot de passe :</label>
                <input type="password" name="password"
                       class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-sky-400 focus:outline-none transition shadow-sm">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Confirmer le mot de passe :</label>
                <input type="password" name="password_confirmation"
                       class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-sky-400 focus:outline-none transition shadow-sm">
            </div>

            <!-- Bouton -->
            <button type="submit"
                    class="w-full bg-sky-600 hover:bg-sky-700 text-white font-bold py-3 rounded-2xl shadow-lg transform hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                 Mettre à jour
            </button>
        </form>

        <!-- Message succès -->
        @if(session('success'))
            <p class="mt-4 text-center text-green-600 font-semibold">{{ session('success') }}</p>
        @endif
    </div>
</div>
@endsection
