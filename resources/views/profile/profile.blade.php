@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-lg rounded-2xl p-6 mt-10">
    <h2 class="text-2xl font-bold text-center mb-6 text-sky-600">Mon Profil</h2>

    {{-- Image de profil --}}
    <div class="flex flex-col items-center mb-6">
        <img src="{{ Auth::user()->profile_image 
                    ? asset('uploads/profiles/' . Auth::user()->profile_image) 
                    : asset('images/default.png') }}" 
             alt="Photo de profil"
             class="w-24 h-24 rounded-full object-cover border border-gray-300 shadow">

        <p class="mt-2 text-gray-500">{{ Auth::user()->name }}</p>
        <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>
    </div>

    {{-- Formulaire de mise à jour --}}
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold text-gray-700 mb-1">Changer la photo de profil :</label>
            <input type="file" name="profile_image" accept="image/*"
                   class="block w-full border border-gray-300 rounded-lg p-2">
        </div>

        <div>
            <label class="block font-semibold text-gray-700 mb-1">Nom :</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}"
                   class="w-full border border-gray-300 rounded-lg p-2">
        </div>

        <div>
            <label class="block font-semibold text-gray-700 mb-1">Email :</label>
            <input type="email" name="email" value="{{ Auth::user()->email }}"
                   class="w-full border border-gray-300 rounded-lg p-2">
        </div>

        <button type="submit"
                class="bg-sky-600 hover:bg-sky-700 text-white font-semibold w-full py-2 rounded-lg transition">
            💾 Mettre à jour
        </button>
    </form>
</div>
@endsection
