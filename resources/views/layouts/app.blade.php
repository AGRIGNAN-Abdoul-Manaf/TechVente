<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechVente | @yield('title')</title>

    <!-- 🧩 Favicon (Logo dans l’onglet du navigateur) -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- 🌈 Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ============================================
           🌟 TECHVENTE - STYLE MODERNE ET ÉPURÉ
        ============================================ */

        /* ---------- RESET ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        
        body {
            background: linear-gradient(135deg, #eaf2ff, #f5f9ff);
            color: #1e293b;
            min-height: 100vh;
            line-height: 1.6;
        }

        /* ---------- NAVBAR ---------- */
        nav {
            background: linear-gradient(90deg, #007bff, #0056d6);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 3px solid rgba(255, 255, 255, 0.1);
        }

        nav h1 {
            font-size: 100%;
            font-weight: bolder;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        nav ul li a {
            color: #f0f8ff;
            text-decoration: none;
            font-weight: bolder;
            transition: color 0.3s, transform 0.2s;
        }

        nav ul li a:hover {
            color: #ffeb3b;
            transform: translateY(-2px);
        }

        nav button {
            background: #ff4b5c;
            border: none;
            padding: 10px 18px;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: 600;
        }

        nav button:hover {
            background: #e63946;
        }

        /* ---------- MAIN CONTENT ---------- */
        main {
            padding: 50px 30px;
            max-width: 1200px;
            margin: auto;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* ---------- TITRES ---------- */
        h1.page-title, h2, h3 {
            color: #0056d6;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
        }

        /* ---------- TABLES ---------- */
        .table-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #1e293b;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #007bff;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f1f5ff;
        }

        /* ---------- FORMULAIRES ---------- */
        .form-card {
            background: white;
            padding: 35px;
            border-radius: 12px;
            max-width: 600px;
            margin: 30px auto;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }

        .form-card label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }

        .form-card input,
        .form-card select,
        .form-card textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            margin-bottom: 15px;
            outline: none;
            transition: all 0.2s;
        }

        .form-card input:focus,
        .form-card select:focus,
        .form-card textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
        }

        /* ---------- BOUTONS ---------- */
        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background: #0056d6;
        }

        .btn-success {
            background: #28a745;
            color: white;
        }
        .btn-success:hover {
            background: #218838;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background: #b52a37;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background: #5a6268;
        }

        /* ---------- FOOTER ---------- */
        footer {
            background: #f8f9ff;
            color: #555;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            border-top: 1px solid #e2e8f0;
        }

        /* ---------- RESPONSIVE ---------- */
        @media screen and (max-width: 768px) {
            nav {
                flex-direction: column;
                gap: 10px;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
                gap: 12px;
            }

            main {
                padding: 25px;
            }

            .form-card {
                width: 90%;
                padding: 25px;
            }
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- 🌐 Navbar -->
    <nav class="p-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="TechVente Logo" class="w-10 h-10 rounded-full">
            <h1 class="text-xl font-bold text-white">TechVente</h1>
        </div>

        <ul class="flex space-x-6">
            <li><a href="{{ route('products.index') }}" class="hover:text-yellow-300">Products</a></li>
            <li><a href="{{ route('clients.index') }}" class="hover:text-yellow-300">Clients</a></li>
            <li><a href="{{ route('sales.index') }}" class="hover:text-yellow-300">Sales</a></li>
            <li><a href="{{ route('reports.index') }}" class="hover:text-yellow-300">Reports</a></li>
        </ul>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-sky-600 hover:bg-sky-500 text-white px-4 py-2 rounded-lg">Logout</button>
        </form>
    </nav>

    <!-- 🧱 Main content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

    <!-- 🦶 Footer -->
    <footer class="text-center py-4 text-gray-400 text-sm">
        © {{ date('Y') }} TechVente. Tous droits réservés.
    </footer>
</body>
</html>
