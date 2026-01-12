@extends('layouts.app')

@section('content')
<div class="edit-client-container">
    <div class="card">
        <h1 class="card-title">Modifier le Client</h1>

        <form action="{{ route('clients.update', $client->id) }}" method="POST" class="edit-client-form">
            @csrf 
            @method('PUT')

            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" value="{{ $client->name }}" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="{{ $client->email }}" required>

            <label for="phone">Téléphone :</label>
            <input type="text" id="phone" name="phone" value="{{ $client->phone }}" required>

            <button type="submit" class="btn-update">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection
<style>
    /* =========================
   PAGE EDIT CLIENT
========================= */

.edit-client-container {
    max-width: 500px;
    margin: 60px auto;
    padding: 20px;
}

/* Carte du formulaire */
.card {
    background-color: #ffffff;
    padding: 28px;
    border-radius: 16px;
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
}

/* Titre */
.card-title {
    text-align: center;
    font-size: 26px;
    font-weight: 700;
    color: #1d4ed8; /* Bleu */
    margin-bottom: 25px;
}

/* Formulaire */
.edit-client-form label {
    display: block;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
    font-size: 14px;
}

.edit-client-form input {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    margin-bottom: 18px;
    font-size: 14px;
    transition: all 0.25s ease;
}

.edit-client-form input:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.25);
}

/* Bouton */
.btn-update {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 15px;
    color: #fff;
    background: linear-gradient(135deg, #22c55e, #16a34a);
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-update:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(34, 197, 94, 0.35);
}

/* RESPONSIVE */
@media (max-width: 600px) {
    .edit-client-container {
        margin: 30px 15px;
    }

    .card-title {
        font-size: 22px;
    }

    .edit-client-form input {
        padding: 10px 12px;
    }

    .btn-update {
        padding: 10px;
        font-size: 14px;
    }
}

</style>