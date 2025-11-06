@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800"> Mon Profil</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Photo de profil -->
        <div class="flex items-center gap-4 mb-6">
            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/100' }}" 
                 alt="Photo de profil" 
                 class="w-24 h-24 rounded-full object-cover border">
            <input type="file" name="profile_picture" class="border border-gray-300 p-2 rounded w-full">
        </div>

        <!-- Nom -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Nom complet</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                   class="w-full border border-gray-300 rounded p-2">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Adresse e-mail</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                   class="w-full border border-gray-300 rounded p-2">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Mot de passe -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-1">Nouveau mot de passe</label>
            <input type="password" name="password" class="w-full border border-gray-300 rounded p-2">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Confirmation mot de passe -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-1">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded p-2">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                 Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
