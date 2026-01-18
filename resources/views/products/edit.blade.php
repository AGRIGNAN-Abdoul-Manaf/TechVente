@extends('layout')

@section('title', 'Modifier le Produit')

@section('content')
<div class="edit-product-container">
    <h1 class="page-title">Modifier le Produit</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="form-card">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price (FCFA):</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="quantity">Stock Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Product Image:</label>
            <input type="file" name="image" id="imageInput" accept="image/*">
            @if($product->image)
                <img id="preview" src="{{ asset('storage/products/' . $product->image) }}" 
                     alt="Aperçu" class="mt-2 w-40 h-40 object-cover rounded-md">
            @else
                <img id="preview" src="#" alt="Aperçu" class="mt-2 hidden w-40 h-40 object-cover rounded-md">
            @endif
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    const imageInput = document.getElementById('imageInput');
    const preview = document.getElementById('preview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
<style>
    /* Container */
.edit-product-container {
    max-width: 700px;
    margin: 50px auto;
    padding: 20px;
}

/* Title */
.page-title {
    font-size: 2rem;
    font-weight: 700;
    color: #16a34a; /* Vert moderne */
    margin-bottom: 20px;
    text-align: center;
}

/* Form card */
.form-card {
    background-color: #fff;
    border-radius: 10px;
    padding: 25px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* Form groups */
.form-group {
    margin-bottom: 18px;
}

.form-group label {
    display: block;
    font-weight: 600;
    color: #374151; /* Gris foncé */
    margin-bottom: 6px;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #d1d5db; /* Gris clair */
    border-radius: 8px;
    font-size: 1rem;
    color: #111827;
    outline: none;
    transition: all 0.2s ease-in-out;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #16a34a;
    box-shadow: 0 0 0 2px rgba(22,163,74,0.2);
}

/* Buttons */
.form-buttons {
    display: flex;
    gap: 12px;
    justify-content: flex-start;
    margin-top: 10px;
}

.btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    display: inline-block;
}

.btn-success {
    background-color: #16a34a;
    color: #fff;
}

.btn-success:hover {
    background-color: #15803d;
}

.btn-secondary {
    background-color: #6b7280;
    color: #fff;
}

.btn-secondary:hover {
    background-color: #4b5563;
}

/* Responsive */
@media (max-width: 640px) {
    .form-buttons {
        flex-direction: column;
    }
}

</style>