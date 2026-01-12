@extends('layout')

@section('title', 'Clients')

@section('content')
<div class="container mx-auto mt-6 px-4">

    <!-- Titre -->
    <h1 class="text-2xl font-bold text-blue-700 mb-4">
        Liste des Clients
    </h1>

    <!-- Bouton ajouter -->
   <a href="{{ route('clients.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-green-700">
        ➕ Ajouter un client
    </a>



    <!-- Table responsive -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 border-b text-left">ID</th>
                    <th class="px-4 py-3 border-b text-left">Nom</th>
                    <th class="px-4 py-3 border-b text-left">Email</th>
                    <th class="px-4 py-3 border-b text-left">Téléphone</th>
                    <th class="px-4 py-3 border-b text-center w-40">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($clients as $client)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $client->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $client->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $client->email }}</td>
                    <td class="px-4 py-2 border-b">{{ $client->phone ?? '-' }}</td>

                    <!-- COLONNE ACTIONS (CORRIGÉE) -->
                    <td class="px-4 py-2 border-b">
                        <div class="flex justify-center items-center gap-2">

                            <!-- Voir -->
                            <a href="{{ route('clients.show', $client->id) }}"
                               title="Voir"
                               class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-500 text-white hover:bg-gray-600 transition">
                                👁️
                            </a>

                            <!-- Modifier -->
                            <a href="{{ route('clients.edit', $client->id) }}"
                               title="Modifier"
                               class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition">
                                ✏️
                            </a>

                            <!-- Supprimer -->
                            <form action="{{ route('clients.destroy', $client->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Supprimer ce client ?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        title="Supprimer"
                                        class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                                    🗑
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
