@extends('layouts.app')

@section('content')
<div class="content">
    <h1 class="page-title"> Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="form-card">
        @csrf
        @method('PUT')

        <label>Product Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>

        <label>Category:</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label>Price (FCFA):</label>
        <input type="number" name="price" value="{{ $product->price }}" required>

        <label>Stock Quantity:</label>
        <input type="number" name="quantity" value="{{ $product->quantity }}" required>

        <label>Description:</label>
        <textarea name="description" rows="4" required>{{ $product->description }}</textarea>

        <button type="submit" class="btn btn-success"> Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary"> Cancel</a>
    </form>
</div>
@endsection
