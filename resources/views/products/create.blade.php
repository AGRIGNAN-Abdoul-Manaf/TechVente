{{-- @extends('layouts.app')
@section('title', 'Add Product')

@section('content')
<div class="card max-w-2xl mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Add New Product</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="block mb-1">Product Name</label>
            <input type="text" name="name" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Category</label>
            <select name="category_id" class="w-full p-2 rounded bg-gray-800 text-white">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Price</label>
            <input type="number" name="price" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Stock</label>
            <input type="number" name="stock" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Image</label>
            <input type="file" name="image" class="w-full p-2 rounded bg-gray-800 text-white">
        </div>

        <button class="bg-sky-600 hover:bg-sky-500 text-white px-4 py-2 rounded-lg">Save</button>
    </form>
</div>
@endsection --}}

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form-card">
    @csrf

    <label>Nom du produit:</label>
    <input type="text" name="name" value="{{ old('name') }}" required>

    <label>Catégorie:</label>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <label>Prix (FCFA):</label>
    <input type="number" name="price" value="{{ old('price') }}" required>

    <label>Quantité en stock:</label>
    <input type="number" name="quantity" value="{{ old('quantity') }}" required>

    <label>Description:</label>
    <textarea name="description" rows="4" required>{{ old('description') }}</textarea>

    <label>Image du produit:</label>
    <label for="imageInput" class="btn btn-primary cursor-pointer w-full text-center">Sélectionner une image</label>
    <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">
    <img id="preview" src="#" alt="Aperçu image" class="mt-2 hidden w-40 h-40 object-cover rounded-md">

    <button type="submit" class="btn btn-success mt-4 w-full">Ajouter le produit</button>
</form>

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
        } else {
            preview.src = '#';
            preview.classList.add('hidden');
        }
    });
</script>


<style>
    /* ----------------------------
   🧾 Formulaire Ajouter / Modifier Produit
----------------------------- */
.form-card {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    max-width: 600px;
    margin: 40px auto;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    font-family: 'Poppins', sans-serif;
}

/* Labels */
.form-card label {
    display: block;
    font-weight: 600;
    margin-bottom: 6px;
    color: #333;
}

/* Inputs, Select, Textarea */
.form-card input[type="text"],
.form-card input[type="number"],
.form-card input[type="file"],
.form-card select,
.form-card textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #cbd5e1;        /* Bord gris clair */
    border-radius: 8px;
    margin-bottom: 15px;
    outline: none;
    font-size: 1rem;
    transition: 0.3s;
    background-color: #f9fafb;
    color: #333;
}

.form-card input[type="text"]:focus,
.form-card input[type="number"]:focus,
.form-card input[type="file"]:focus,
.form-card select:focus,
.form-card textarea:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0,123,255,0.3);
    background-color: #fff;
}

/* Placeholder */
.form-card textarea::placeholder {
    color: #a0aec0;
    font-style: italic;
}

/* Bouton */
.btn-success {
    background: #28a745;
    color: #fff;
    padding: 12px 20px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    transition: 0.3s;
}

.btn-success:hover {
    background: #218838;
}

/* Aperçu image */
#preview {
    display: block;
    margin-top: 10px;
    width: 160px;
    height: 160px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #cbd5e1;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

/* Responsive */
@media screen and (max-width: 768px) {
    .form-card {
        width: 90%;
        padding: 25px;
    }

    #preview {
        width: 100%;
        height: auto;
    }
}

</style>

