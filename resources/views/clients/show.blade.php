@extends('layouts.app')

@section('title', 'Détails du client')

@section('content')
<div class="client-card">

    <h2 class="client-title">
         Détails du client
    </h2>

    <div class="client-info">
        <p><span>Nom :</span> {{ $client->name }}</p>
        <p><span>Email :</span> {{ $client->email }}</p>
        <p><span>Téléphone :</span> {{ $client->phone ?? '-' }}</p>
        <p><span>Adresse :</span> {{ $client->address ?? '-' }}</p>
    </div>

    <div class="client-actions">
        <a href="{{ route('clients.history', $client->id) }}" class="btn-history">
             Historique des achats
        </a>

        <a href="{{ route('clients.index') }}" class="btn-back">
            ⬅ Retour à la liste
        </a>
    </div>

</div>
@endsection
<style>
    /* ==========================
   PAGE DÉTAIL CLIENT
========================== */

.client-card {
    max-width: 700px;
    margin: 60px auto;
    background: #ffffff;
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    padding: 30px;
}

/* Titre */
.client-title {
    font-size: 22px;
    font-weight: 700;
    color: #1e40af;
    margin-bottom: 25px;
    text-align: center;
}

/* Infos */
.client-info p {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid #e5e7eb;
    font-size: 15px;
    color: #1f2937;
}

.client-info p:last-child {
    border-bottom: none;
}

.client-info span {
    font-weight: 600;
    color: #374151;
}

/* Actions */
.client-actions {
    margin-top: 30px;
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}

/* Bouton historique */
.btn-history {
    background-color: #0284c7;
    color: #ffffff;
    padding: 10px 18px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-history:hover {
    background-color: #0369a1;
}

/* Bouton retour */
.btn-back {
    background-color: #6b7280;
    color: #ffffff;
    padding: 10px 18px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-back:hover {
    background-color: #4b5563;
}

/* ==========================
   RESPONSIVE
========================== */
@media (max-width: 640px) {
    .client-card {
        margin: 30px 15px;
        padding: 20px;
    }

    .client-info p {
        flex-direction: column;
        gap: 6px;
    }

    .client-title {
        font-size: 20px;
    }
}

</style>