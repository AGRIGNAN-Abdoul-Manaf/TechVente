@extends('layout')

@section('title', 'Mon Profil')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Colonne Gauche : Aperçu & Photo -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center">
                <div class="relative inline-block group">
                    <img id="profilePreview" 
                         src="{{ $user->profile_picture 
                                ? asset('storage/' . $user->profile_picture) 
                                : asset('images/default-user.png') }}" 
                         alt="Photo de profil"
                         class="w-40 h-40 rounded-full object-cover border-4 border-indigo-50 shadow-md transition-all duration-300 group-hover:shadow-lg">
                    <label for="profile_picture" 
                           class="absolute bottom-2 right-2 bg-indigo-600 text-white rounded-full p-2.5 shadow-lg cursor-pointer hover:bg-indigo-700 transition transform hover:scale-110">
                        <i class="bi bi-camera-fill text-lg"></i>
                    </label>
                </div>
                
                <h3 class="mt-4 text-xl font-bold text-gray-800">{{ $user->name }}</h3>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                
                <div class="mt-6 pt-6 border-t border-gray-50 flex justify-around">
                    <div class="text-center">
                        <p class="text-xs uppercase tracking-wider text-gray-400 font-semibold">Membre depuis</p>
                        <p class="text-sm font-medium text-gray-700">{{ $user->created_at->format('M Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-indigo-900 rounded-2xl p-6 text-white shadow-lg overflow-hidden relative">
                <div class="relative z-10">
                    <h4 class="font-bold text-indigo-200 uppercase text-xs tracking-widest mb-4">Conseil Sécurité</h4>
                    <p class="text-sm leading-relaxed opacity-90">
                        Utilisez un mot de passe robuste combinant des lettres, des chiffres et des symboles pour protéger votre accès.
                    </p>
                </div>
                <!-- Décoration -->
                <i class="bi bi-shield-lock absolute -right-4 -bottom-4 text-8xl opacity-10"></i>
            </div>
        </div>

        <!-- Colonne Droite : Formulaire -->
        <div class="lg:col-span-2">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input id="profile_picture" type="file" name="profile_picture" accept="image/*" onchange="previewImage(event)" class="hidden" />

                <!-- Section Informations Générales -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-50 bg-gray-50/50">
                        <h3 class="font-bold text-gray-800">
                            Informations Générales
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-gray-600 ml-1">Nom complet</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" name="name" value="{{ $user->name }}"
                                           class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all outline-none"
                                           placeholder="Votre nom">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-gray-600 ml-1">Adresse Email</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" name="email" value="{{ $user->email }}"
                                           class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all outline-none"
                                           placeholder="exemple@email.com">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Sécurité -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-50 bg-gray-50/50">
                        <h3 class="font-bold text-gray-800">
                            Sécurité & Mot de Passe
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <p class="text-xs text-info text-gray-500 mb-4">Laissez vide si vous ne souhaitez pas modifier votre mot de passe.</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-gray-600 ml-1">Nouveau mot de passe</label>
                                <input type="password" name="password"
                                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all outline-none">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-gray-600 ml-1">Confirmer</label>
                                <input type="password" name="password_confirmation"
                                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bouton Actions -->
                <div class="flex items-center justify-end gap-4 pt-4">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all flex items-center gap-2">
                         <i class="bi bi-save2"></i> Enregistrer les modifications
                    </button>
                </div>
            </form>

            @if(session('success'))
                <div class="mt-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-xl flex items-center gap-3 text-green-700">
                    <i class="bi bi-check-circle-fill text-xl"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('profilePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
