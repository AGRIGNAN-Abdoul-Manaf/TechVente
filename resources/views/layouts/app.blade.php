<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechVente | @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="p-4 flex justify-between items-center">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 hover:opacity-90 transition">
    <img src="{{ asset('images/logo.png') }}" alt="TechVente Logo" class="w-10 h-10 rounded-full">
    <h1 class="text-xl font-bold text-white">TechVente</h1>
</a>


        <ul class="flex space-x-6">
            <li><a href="{{ route('products.index') }}">Produits</a></li>
            <li><a href="{{ route('clients.index') }}">Clients</a></li>
            <li><a href="{{ route('sales.index') }}">Ventes</a></li>
            <li><a href="{{ route('reports.index') }}">Rapports</a></li>


        </ul>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-sky-600 hover:bg-sky-500 text-white px-4 py-2 rounded-lg">Déconnexion</button>
        </form>
    </nav>

    <!-- Flash messages -->
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded m-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Main content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 text-gray-400 text-sm">
        © {{ date('Y') }} TechVente. Tous droits réservés.
         <a href="{{ route('terms') }}" class="text-blue-600 hover:underline">Termes et Conditions</a> |
    <a href="{{ route('privacy') }}" class="text-blue-600 hover:underline">Politique de Confidentialité</a>
    </footer>
</body>
</html>
<style>
 <style>
/* ==================== RESET ==================== */
* {
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

body {
    background: linear-gradient(135deg, #f8fafc, #eef2ff);
    color:#0f172a;
    min-height:100vh;
    line-height:1.6;
}

/* ==================== NAVIGATION ==================== */
nav {
    background: linear-gradient(90deg, #0f172a, #312e81);
    box-shadow:0 10px 25px rgba(0,0,0,0.25);
    padding:18px 45px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    color:white;
    position:sticky;
    top:0;
    z-index:100;
    border-bottom:3px solid #6366f1;
}

nav h1 {
    font-size:1.4rem;
    font-weight:800;
    letter-spacing:1px;
}

nav ul {
    list-style:none;
    display:flex;
    gap:30px;
}

nav ul li a {
    color:#e5e7eb;
    text-decoration:none;
    font-weight:600;
    padding:8px 14px;
    border-radius:10px;
    transition:all 0.3s ease;
}

nav ul li a:hover {
    background:#6366f1;
    color:white;
    transform:translateY(-3px);
}

nav button {
    background:linear-gradient(to right, #fbbf24, #f59e0b);
    border:none;
    padding:10px 22px;
    color:#1f2933;
    border-radius:14px;
    cursor:pointer;
    font-weight:700;
    transition:0.3s;
}

nav button:hover {
    background:linear-gradient(to right, #f59e0b, #d97706);
    transform:scale(1.05);
}

/* ==================== MAIN ==================== */
main {
    padding:70px 30px;
    max-width:1200px;
    margin:auto;
}

/* ==================== CARDS ==================== */
.card {
    background:white;
    border-radius:22px;
    padding:32px;
    box-shadow:0 15px 40px rgba(0,0,0,0.1);
    margin-bottom:35px;
    transition:all 0.35s ease;
}

.card:hover {
    transform:translateY(-10px);
    box-shadow:0 25px 60px rgba(0,0,0,0.18);
}

/* TITRES */
h1.page-title, h2, h3 {
    color:#312e81;
    margin-bottom:30px;
    font-weight:800;
    text-align:center;
}

/* ==================== TABLES ==================== */
.table-card {
    background:white;
    border-radius:18px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.12);
    overflow-x:auto;
}

table {
    width:100%;
    border-collapse:collapse;
}

th, td {
    padding:16px;
    border-bottom:1px solid #e5e7eb;
}

th {
    background:#312e81;
    color:white;
    text-transform:uppercase;
    font-size:0.85rem;
    letter-spacing:1px;
}

tr:nth-child(even) {
    background:#f1f5f9;
}

/* ==================== FORMULAIRES ==================== */
.form-card {
    background:white;
    padding:45px;
    border-radius:24px;
    max-width:600px;
    margin:40px auto;
    box-shadow:0 15px 45px rgba(0,0,0,0.12);
}

.form-card label {
    font-weight:700;
    margin-bottom:8px;
    display:block;
}

.form-card input,
.form-card select,
.form-card textarea {
    width:100%;
    padding:14px;
    border-radius:14px;
    border:1px solid #c7d2fe;
    margin-bottom:20px;
    transition:0.3s;
}

.form-card input:focus,
.form-card select:focus,
.form-card textarea:focus {
    border-color:#6366f1;
    box-shadow:0 0 10px rgba(99,102,241,0.4);
}

/* ==================== BOUTONS ==================== */
.btn {
    padding:14px 22px;
    border-radius:14px;
    font-weight:800;
    cursor:pointer;
    transition:0.3s;
    border:none;
}

.btn-primary {
    background:linear-gradient(to right, #6366f1, #4f46e5);
    color:white;
}

.btn-primary:hover {
    background:linear-gradient(to right, #4f46e5, #4338ca);
    transform:scale(1.05);
}

.btn-success {
    background:linear-gradient(to right, #22c55e, #16a34a);
    color:white;
}

.btn-danger {
    background:linear-gradient(to right, #ef4444, #dc2626);
    color:white;
}

/* ==================== FOOTER ==================== */
footer {
    background:#0f172a;
    color:#e5e7eb;
    padding:22px;
    font-size:14px;
    border-top:3px solid #6366f1;
}

/* ==================== RESPONSIVE ==================== */
@media (max-width:768px) {
    nav {
        flex-direction:column;
        gap:15px;
    }
    nav ul {
        flex-direction:column;
        gap:15px;
    }
}
</style>

</style>