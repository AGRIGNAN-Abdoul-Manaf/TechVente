@extends('layout')

@section('title', 'Clients')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-2xl font-bold text-blue-700">Liste des Clients</h1>

    <a href="{{ route('clients.create') }}" 
       class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-green-600">
       + Ajouter un client
    </a>

    <table class="table-auto w-full border-collapse border border-gray-300 shadow-lg rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-blue-600 text-white">
                <th class="border px-4 py-2 text-left">ID</th>
                <th class="border px-4 py-2 text-left">Nom</th>
                <th class="border px-4 py-2 text-left">Email</th>
                <th class="border px-4 py-2 text-left">Téléphone</th>
                <th class="border px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr class="hover:bg-gray-100 transition">
                <td class="border px-4 py-2">{{ $client->id }}</td>
                <td class="border px-4 py-2">{{ $client->name }}</td>
                <td class="border px-4 py-2">{{ $client->email }}</td>
                <td class="border px-4 py-2">{{ $client->phone ?? '-' }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <!-- Modifier -->
                    <a href="{{ route('clients.edit', $client->id) }}" 
                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                       Modifier
                    </a>

                    <!-- Historique -->
                    <a href="{{ route('clients.history', $client->id) }}" 
                       class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600">
                       Historique
                    </a>

                    <!-- Supprimer -->
                    <form action="{{ route('clients.destroy', $client->id) }}" 
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" 
                                onclick="return confirm('Supprimer ce client ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
