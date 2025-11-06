@extends('layouts.app')
@section('title', 'Add Client')

@section('content')
<div class="card max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Add New Client</h2>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block mb-1">Name</label>
            <input type="text" name="name" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Phone</label>
            <input type="text" name="phone" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Address</label>
            <input type="text" name="address" class="w-full p-2 rounded bg-gray-800 text-white">
        </div>

        <button class="bg-sky-600 hover:bg-sky-500 text-white px-4 py-2 rounded-lg">Save</button>
    </form>
</div>
@endsection
