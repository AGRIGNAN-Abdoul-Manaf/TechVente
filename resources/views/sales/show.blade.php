@extends('layouts.app')

@section('content')
<div class="content">
    <h1 class="page-title"> Sale Details</h1>
    <div class="details-card">
        <p><strong>Client:</strong> {{ $sale->client->name }}</p>
        <p><strong>Date:</strong> {{ $sale->sale_date }}</p>
        <p><strong>Total:</strong> {{ $sale->total_amount }} FCFA</p>
    </div>
    <a href="{{ route('sales.index') }}" class="btn btn-secondary"> Back</a>
</div>
@endsection
