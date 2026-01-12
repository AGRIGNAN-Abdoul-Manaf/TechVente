@extends('layouts.app')
@section('title', 'Add Client')

@section('content')
<div class="card max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Ajouter un nouveau client</h2>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block mb-1 font-semibold text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1 font-semibold text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1 font-semibold text-gray-700">Phone</label>
            <input type="text" name="phone" class="w-full p-2 rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label class="block mb-1 font-semibold text-gray-700">Address</label>
            <input type="text" name="address" class="w-full p-2 rounded border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('address') }}">
        </div>

        <button type="submit" class="bg-sky-600 hover:bg-sky-500 text-white px-4 py-2 rounded-lg font-semibold">
            Save
        </button>
    </form>
</div>
@endsection
