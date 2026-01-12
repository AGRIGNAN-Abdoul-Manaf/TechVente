@extends('layouts.app')

@section('content')

<!-- ================= HERO ================= -->
<section class="hero">
    <div class="overlay"></div>

    <div class="hero-content">
        <h1>Bienvenue sur <span class="highlight">TechVente</span></h1>
        <p>
            Gérez facilement vos <strong>produits</strong>,
            <strong>clients</strong> et <strong>ventes</strong>
            avec une plateforme moderne et intuitive.
        </p>

        <div class="hero-buttons">
            <a href="{{ route('products.index') }}" class="btn btn-sky">Produits</a>
            <a href="{{ route('clients.index') }}" class="btn btn-green">Clients</a>
            <a href="{{ route('sales.index') }}" class="btn btn-yellow">Ventes</a>
            <a href="{{ route('reports.index') }}" class="btn btn-purple">Rapports</a>
        </div>
    </div>
</section>

<!-- ================= AVANTAGES ================= -->
<section class="advantages">
    <style>
        .advantages {
            background: linear-gradient(120deg, #020617, #020617, #0f172a);
            padding: 90px 20px;
            font-family: 'Segoe UI', sans-serif;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .advantages::before {
            content: "";
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, #38bdf8, transparent 70%);
            opacity: 0.3;
        }

        .advantages-container {
            max-width: 1150px;
            margin: auto;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .advantages h2 {
            font-size: 2.8rem;
            font-weight: 900;
            margin-bottom: 15px;
        }

        .advantages h2 span {
            color: #38bdf8;
        }

        .advantages-subtitle {
            max-width: 700px;
            margin: 0 auto 60px;
            color: #cbd5f5;
            font-size: 1.15rem;
            line-height: 1.7;
        }

        .adv-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 35px;
        }

        .adv-card {
            background: linear-gradient(180deg, #0f172a, #020617);
            border-radius: 22px;
            padding: 45px 30px;
            box-shadow: 0 0 0 1px rgba(255,255,255,0.05),
                        0 20px 40px rgba(0,0,0,0.5);
            transition: all 0.35s ease;
            position: relative;
        }

        .adv-card::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 22px;
            background: linear-gradient(120deg, transparent, rgba(56,189,248,0.3), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .adv-card:hover::after {
            opacity: 1;
        }

        .adv-card:hover {
            transform: translateY(-14px) scale(1.03);
        }

        .adv-icon {
            width: 70px;
            height: 70px;
            margin: auto;
            border-radius: 50%;
            background: linear-gradient(135deg, #38bdf8, #0ea5e9);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(56,189,248,0.6);
            margin-bottom: 25px;
        }

        .adv-icon img {
            width: 36px;
            filter: brightness(0) invert(1);
        }

        .adv-card h3 {
            font-size: 1.4rem;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .adv-card p {
            font-size: 1rem;
            color: #cbd5f5;
            line-height: 1.6;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .advantages h2 {
                font-size: 2.2rem;
            }
        }
    </style>

    <div class="advantages-container">
        <h2>Pourquoi choisir <span>TechVente</span> ?</h2>

        <p class="advantages-subtitle">
            Une plateforme moderne conçue pour centraliser vos ventes,
            analyser vos performances et accélérer la croissance de votre activité.
        </p>

        <div class="adv-grid">

            <div class="adv-card">
                <div class="adv-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/3208/3208707.png">
                </div>
                <h3>Simplicité absolue</h3>
                <p>
                    Une prise en main rapide avec une interface fluide,
                    claire et pensée pour tous les profils.
                </p>
            </div>

            <div class="adv-card">
                <div class="adv-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/4213/4213925.png">
                </div>
                <h3>Analyses intelligentes</h3>
                <p>
                    Des statistiques dynamiques pour suivre vos ventes
                    et prendre de meilleures décisions.
                </p>
            </div>

            <div class="adv-card">
                <div class="adv-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png">
                </div>
                <h3>Sécurité avancée</h3>
                <p>
                    Vos données sont protégées par des standards
                    modernes de sécurité et de confidentialité.
                </p>
            </div>

        </div>
    </div>
</section>



<!-- ================= ILLUSTRATION ================= -->
<section class="illustration">
    <style>
        .illustration {
            padding: 80px 20px;
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
        }

        .illustration-content {
            max-width: 1200px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }

        .illustration-text {
            flex: 1;
        }

        .illustration-text h2 {
            font-size: 2.4rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .illustration-text p {
            font-size: 1.1rem;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 520px;
        }

        .btn-sky {
            display: inline-block;
            padding: 14px 34px;
            background: linear-gradient(135deg, #38bdf8, #0ea5e9);
            color: #ffffff;
            font-weight: 700;
            border-radius: 999px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 12px 25px rgba(14, 165, 233, 0.35);
        }

        .btn-sky:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px rgba(14, 165, 233, 0.45);
        }

        .illustration-img {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .illustration-img img {
            max-width: 420px;
            width: 100%;
            border-radius: 24px;
            background: #ffffff;
            padding: 30px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .illustration-content {
                flex-direction: column;
                text-align: center;
            }

            .illustration-text p {
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>

    <div class="illustration-content">
        <div class="illustration-text">
            <h2>Un tableau de bord complet</h2>
            <p>
                Visualisez ventes, produits, clients et statistiques
                en un seul endroit pour gagner du temps.
            </p>
            <a href="{{ route('dashboard') }}" class="btn-sky">
                Voir le tableau de bord
            </a>
        </div>

        <div class="illustration-img">
            <img src="{{ asset('images/logo.png') }}" alt="Dashboard TechVente">
        </div>
    </div>
</section>


<!-- ================= CTA ================= -->
<section class="cta">
    <style>
        .cta {
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            padding: 80px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cta-container {
            max-width: 900px;
            width: 100%;
            text-align: center;
            color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .cta-container h2 {
            font-size: 2.6rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .cta-container h2 span {
            color: #ffca28;
        }

        .cta-container p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 35px;
            opacity: 0.95;
        }

        .cta-btn {
            display: inline-block;
            padding: 14px 36px;
            background-color: #ffca28;
            color: #0d47a1;
            font-weight: 700;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.05rem;
            transition: all 0.3s ease;
        }

        .cta-btn:hover {
            background-color: #ffc107;
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cta-container {
                padding: 30px 20px;
            }

            .cta-container h2 {
                font-size: 2rem;
            }

            .cta-container p {
                font-size: 1rem;
            }
        }
    </style>

    <div class="cta-container">
        <h2>Rejoignez la révolution <span>TechVente</span></h2>
        <p>
            Une solution tout-en-un pour booster votre activité et gérer vos ventes efficacement.
        </p>
        <a href="{{ route('register') }}" class="cta-btn">
            Créer un compte gratuitement
        </a>
    </div>
</section>

@endsection
<style>
    /* ========== RESET ========== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    color: #1e293b;
    line-height: 1.6;
    overflow-x: hidden;
}

/* ========== HERO FULL WIDTH ========== */
.hero {
    position: relative;
    width: 100vw;
    min-height: 100vh;

    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;

    background: url("https://images.unsplash.com/photo-1519389950473-47ba0277781c")
        center / cover no-repeat;

    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.65);
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 900px;
    padding: 20px;
}

.hero h1 {
    font-size: clamp(2rem, 5vw, 3.2rem);
    font-weight: 800;
    color: white;
}

.highlight {
    color: #38bdf8;
}

.hero p {
    font-size: clamp(1rem, 2.5vw, 1.25rem);
    color: #e5e7eb;
    margin: 20px 0 35px;
}

/* ========== BUTTONS ========== */
.hero-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
}

.btn {
    padding: 12px 28px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
    color: white;
}

.btn:hover {
    transform: translateY(-3px);
    opacity: 0.9;
}

.btn-sky { background: #0ea5e9; }
.btn-green { background: #22c55e; }
.btn-yellow { background: #eab308; }
.btn-purple { background: #8b5cf6; }
.btn-white {
    background: white;
    color: #0ea5e9;
}

/* ========== AVANTAGES ========== */
.advantages {
    background: #f1f5f9;
    padding: 80px 20px;
    text-align: center;
}

.advantages h2 {
    font-size: clamp(1.6rem, 4vw, 2.3rem);
    margin-bottom: 50px;
}

.adv-grid {
    max-width: 1200px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

.adv-card {
    background: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.adv-card:hover {
    transform: translateY(-6px);
}

.adv-card img {
    width: 60px;
    margin-bottom: 15px;
}

/* ========== ILLUSTRATION ========== */
.illustration {
    padding: 80px 20px;
}

.illustration-content {
    max-width: 1200px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 40px;
    align-items: center;
}

.illustration-img img {
    width: 220px;
    height: 220px;
    border-radius: 50%;
    border: 4px solid #38bdf8;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    margin: auto;
}

/* ========== CTA ========== */
.cta {
    background: #0ea5e9;
    color: white;
    text-align: center;
    padding: 80px ;
}

.cta h2 {
    font-size: clamp(1.5rem, 4vw, 2.2rem);
    margin-bottom: 15px;
}

</style>