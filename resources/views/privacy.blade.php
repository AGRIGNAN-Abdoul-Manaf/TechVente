@extends('layouts.app')

@section('title', 'Politique de Confidentialité')

@section('content')
<style>
    /* Container central */
    .privacy-container {
        max-width: 900px;
        margin: 40px auto;
        background: #ffffff;
        padding: 40px 50px;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.7;
        color: #1f2937;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .privacy-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    /* Titres */
    .privacy-container h1 {
        font-size: 2.5rem;
        color: #4f46e5; /* Violet TechVente */
        margin-bottom: 20px;
        text-align: center;
        font-weight: 800;
    }

    .privacy-container h2 {
        font-size: 1.5rem;
        color: #1e40af; /* Bleu foncé */
        margin-top: 30px;
        margin-bottom: 10px;
        font-weight: 700;
        border-left: 4px solid #4f46e5;
        padding-left: 10px;
    }

    /* Paragraphes */
    .privacy-container p {
        font-size: 1rem;
        margin-bottom: 15px;
        color: #374151;
    }

    /* Petit texte en bas */
    .privacy-container .footer-note {
        font-size: 0.85rem;
        color: #6b7280;
        margin-top: 25px;
        text-align: center;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .privacy-container {
            padding: 25px 20px;
            margin: 20px;
        }

        .privacy-container h1 {
            font-size: 2rem;
        }

        .privacy-container h2 {
            font-size: 1.3rem;
        }
    }
</style>

<div class="privacy-container">
    <h1>Politique de Confidentialité</h1>

    <p>
        Chez <strong>TechVente</strong>, la confidentialité de vos données est une priorité. Cette politique explique comment vos informations sont collectées, utilisées et protégées.
    </p>

    <h2>1. Collecte des données</h2>
    <p>
        TechVente collecte uniquement les informations nécessaires pour la gestion des ventes et des clients (nom, email, téléphone).
    </p>

    <h2>2. Utilisation des données</h2>
    <p>
        Les données sont utilisées uniquement pour la gestion interne du projet et ne seront jamais partagées avec des tiers sans autorisation.
    </p>

    <h2>3. Sécurité</h2>
    <p>
        Toutes les données sont stockées de manière sécurisée. L’administrateur doit veiller à la protection des comptes et des informations sensibles.
    </p>

    <h2>4. Droits de l’utilisateur</h2>
    <p>
        L’administrateur peut consulter, modifier ou supprimer les informations clients à tout moment via le tableau de bord.
    </p>

    <p class="footer-note">
        Merci de faire confiance à TechVente pour la gestion de vos informations.
    </p>
</div>
@endsection
