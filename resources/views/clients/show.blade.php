@extends('layouts.app')

@section('content')
<div class="content">
    <h1 class="page-title"> Client Details</h1>
    <div class="details-card">
        <p><strong>Name:</strong> {{ $client->name }}</p>
        <p><strong>Email:</strong> {{ $client->email }}</p>
        <p><strong>Phone:</strong> {{ $client->phone }}</p>
    </div>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">⬅️ Back</a>
</div>
@endsection
