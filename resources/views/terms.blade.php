@extends('layouts.app')

@section('title', 'Termes et Conditions')

@section('content')
<style>
    /* Container central */
    .terms-container {
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

    .terms-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    /* Titres */
    .terms-container h1 {
        font-size: 2.5rem;
        color: #4f46e5; /* Violet TechVente */
        margin-bottom: 20px;
        text-align: center;
        font-weight: 800;
    }

    .terms-container h2 {
        font-size: 1.5rem;
        color: #1e40af; /* Bleu foncé */
        margin-top: 30px;
        margin-bottom: 10px;
        font-weight: 700;
        border-left: 4px solid #4f46e5;
        padding-left: 10px;
    }

    /* Paragraphes */
    .terms-container p {
        font-size: 1rem;
        margin-bottom: 15px;
        color: #374151;
    }

    /* Petit texte en bas */
    .terms-container .footer-note {
        font-size: 0.85rem;
        color: #6b7280;
        margin-top: 25px;
        text-align: center;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .terms-container {
            padding: 25px 20px;
            margin: 20px;
        }

        .terms-container h1 {
            font-size: 2rem;
        }

        .terms-container h2 {
            font-size: 1.3rem;
        }
    }
</style>

<div class="terms-container">
    <h1>Termes et Conditions d’Utilisation</h1>

    <p>
        Bienvenue sur <strong>TechVente</strong> ! En utilisant cette plateforme, vous acceptez les présentes conditions d’utilisation. 
        Merci de les lire attentivement.
    </p>

    <h2>1. Utilisation de la plateforme</h2>
    <p>
        La plateforme est destinée uniquement à l’administrateur pour gérer les ventes, les clients et les produits. 
        Toute utilisation non autorisée est interdite.
    </p>

    <h2>2. Responsabilités</h2>
    <p>
        L’administrateur est responsable de la gestion des données et doit s’assurer que les informations saisies sont exactes. 
        TechVente n’est pas responsable des erreurs de saisie.
    </p>

    <h2>3. Propriété intellectuelle</h2>
    <p>
        Tous les contenus, logos et éléments graphiques présents sur TechVente sont protégés. Leur utilisation sans autorisation est interdite.
    </p>

    <h2>4. Modifications</h2>
    <p>
        TechVente peut modifier ces termes à tout moment. Les modifications seront effectives dès leur publication sur la plateforme.
    </p>

    <p class="footer-note">
        Merci d’utiliser TechVente de manière responsable.
    </p>
</div>
@endsection
