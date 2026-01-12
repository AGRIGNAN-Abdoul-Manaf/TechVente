@extends('layouts.app')

@section('title', 'Produits Disponibles')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Produits Disponibles</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

    <!-- Produit 1 -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
        <img src="{{ asset('images/products/iphone_17.jpg') }}" 
             alt="iPhone 14" 
             class="w-full h-48 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">iPhone 14</h2>
        <p class="text-gray-600 mb-2">Smartphone Apple avec caméra avancée et iOS 16.</p>
        <p class="font-bold text-blue-700 mb-4">450 000 FCFA</p>

        @guest
            <a href="{{ route('login') }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Connectez-vous pour commander
            </a>
        @else
            <a href="{{ route('sales.create', ['product_id' => 1]) }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Commander
            </a>
        @endguest
    </div>

    <!-- Produit 2 -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
        <img src="{{ asset('images/products/samsung_galaxy_s23.jpg') }}" 
             alt="Samsung Galaxy S23" 
             class="w-full h-48 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">Samsung Galaxy S23</h2>
        <p class="text-gray-600 mb-2">Smartphone Android avec écran AMOLED et caméra triple.</p>
        <p class="font-bold text-blue-700 mb-4">400 000 FCFA</p>

        @guest
            <a href="{{ route('login') }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Connectez-vous pour commander
            </a>
        @else
            <a href="{{ route('sales.create', ['product_id' => 2]) }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Commander
            </a>
        @endguest
    </div>

    <!-- Produit 3 -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
        <img src="{{ asset('images/products/google_pixel_7.jpg') }}" 
             alt="Google Pixel 7" 
             class="w-full h-48 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">Google Pixel 7</h2>
        <p class="text-gray-600 mb-2">Smartphone Android pur avec excellent appareil photo.</p>
        <p class="font-bold text-blue-700 mb-4">380 000 FCFA</p>

        @guest
            <a href="{{ route('login') }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Connectez-vous pour commander
            </a>
        @else
            <a href="{{ route('sales.create', ['product_id' => 3]) }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Commander
            </a>
        @endguest
    </div>

    <!-- Produit 4 -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
        <img src="{{ asset('images/products/oneplus_11.jpg') }}" 
             alt="OnePlus 11" 
             class="w-full h-48 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">OnePlus 11</h2>
        <p class="text-gray-600 mb-2">Smartphone rapide avec OxygenOS et charge ultra rapide.</p>
        <p class="font-bold text-blue-700 mb-4">350 000 FCFA</p>

        @guest
            <a href="{{ route('login') }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Connectez-vous pour commander
            </a>
        @else
            <a href="{{ route('sales.create', ['product_id' => 4]) }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Commander
            </a>
        @endguest
    </div>

    <!-- Produit 5 -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
        <img src="{{ asset('images/products/xiaomi_13.jpg') }}" 
             alt="Xiaomi 13" 
             class="w-full h-48 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">Xiaomi 13</h2>
        <p class="text-gray-600 mb-2">Smartphone Android avec batterie longue durée et charge rapide.</p>
        <p class="font-bold text-blue-700 mb-4">320 000 FCFA</p>

        @guest
            <a href="{{ route('login') }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Connectez-vous pour commander
            </a>
        @else
            <a href="{{ route('sales.create', ['product_id' => 5]) }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Commander
            </a>
        @endguest
    </div>

    <!-- Produit 6 -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
        <img src="{{ asset('images/products/oppo_reno10.jpg') }}" 
             alt="Oppo Reno 10" 
             class="w-full h-48 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">Oppo Reno 10</h2>
        <p class="text-gray-600 mb-2">Smartphone avec design élégant et caméra haute résolution.</p>
        <p class="font-bold text-blue-700 mb-4">280 000 FCFA</p>

        @guest
            <a href="{{ route('login') }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Connectez-vous pour commander
            </a>
        @else
            <a href="{{ route('sales.create', ['product_id' => 6]) }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Commander
            </a>
        @endguest
    </div>

    <!-- Produit 7 -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
        <img src="{{ asset('images/products/tecno_camon21.jpg') }}" 
             alt="Tecno Camon 21" 
             class="w-full h-48 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">Tecno Camon 21</h2>
        <p class="text-gray-600 mb-2">Smartphone avec caméra performante et batterie durable.</p>
        <p class="font-bold text-blue-700 mb-4">150 000 FCFA</p>

        @guest
            <a href="{{ route('login') }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Connectez-vous pour commander
            </a>
        @else
            <a href="{{ route('sales.create', ['product_id' => 7]) }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Commander
            </a>
        @endguest
    </div>

    <!-- Produit 8 -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
        <img src="{{ asset('images/products/infinix_note_13.jpg') }}" 
             alt="Infinix Note 13" 
             class="w-full h-48 object-cover rounded-md mb-4">
        <h2 class="text-xl font-semibold mb-2">Infinix Note 13</h2>
        <p class="text-gray-600 mb-2">Smartphone Android avec grande autonomie et écran large.</p>
        <p class="font-bold text-blue-700 mb-4">130 000 FCFA</p>

        @guest
            <a href="{{ route('login') }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Connectez-vous pour commander
            </a>
        @else
            <a href="{{ route('sales.create', ['product_id' => 8]) }}" 
               class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
               Commander
            </a>
        @endguest
    </div>

</div>
@endsection
