@extends('layouts.app')

@section('content')
<div class="content">
    <h1 class="page-title"> Product Details</h1>

    <div class="details-card">
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Category:</strong> {{ $product->category->name }}</p>
        <p><strong>Price:</strong> {{ $product->price }} FCFA</p>
        <p><strong>Stock:</strong> {{ $product->quantity }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary"> Back</a>
</div>
@endsection
