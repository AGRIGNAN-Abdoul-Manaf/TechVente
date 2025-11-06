@extends('layouts.app')

@section('content')
<div class="content">
    <h1 class="page-title">Modifier une vente</h1>

    <form action="{{ route('sales.update', $sale->id) }}" method="POST" class="form-card">
        @csrf
        @method('PUT')

        <!-- Client -->
        <label>Client :</label>
        <select name="client_id" required>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ $client->id == $sale->client_id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>

        <!-- Date de la vente -->
        <label>Date :</label>
        <input type="date" name="sale_date" value="{{ $sale->sale_date }}" required>

        <!-- ✅ Date d’échéance -->
        <label for="due_date" class="block font-semibold mt-3">Date d'échéance :</label>
        <input 
            type="date" 
            name="due_date" 
            id="due_date"
            value="{{ $sale->due_date ?? '' }}"
            class="border border-gray-300 rounded px-3 py-2 w-full"
        >

        
        <label class="mt-3">Montant total (FCFA) :</label>
        <input type="number" name="total_amount" value="{{ $sale->total_amount }}" required>

        
        <button type="submit" class="btn btn-success mt-4"> Mettre à jour</button>
    </form>
</div>
@endsection
