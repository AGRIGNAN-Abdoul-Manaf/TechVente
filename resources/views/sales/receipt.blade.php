<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de vente #{{ $sale->id }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        /* ===== Global ===== */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }

        .receipt-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        h1, h2, h3 {
            margin: 0;
            font-weight: 600;
        }

        h1 {
            text-align: center;
            color: #3498db;
            margin-bottom: 15px;
        }

        .shop-info {
            text-align: center;
            margin-bottom: 30px;
        }

        .shop-info img {
            width: 80px;
            margin-bottom: 10px;
        }

        .shop-info p {
            margin: 2px 0;
            color: #555;
        }

        .info {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .info p {
            flex: 1 1 45%;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #3498db;
            color: white;
        }

        .total {
            text-align: right;
            font-size: 18px;
            margin-top: 15px;
            font-weight: 600;
        }

        .thank-you {
            text-align: center;
            margin-top: 25px;
            color: #777;
            font-style: italic;
            font-weight: bolder;
        }

        .btn-print {
            text-align: center;
            margin-top: 30px;
        }

        .btn-print button {
            padding: 10px 25px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* ===== Responsive ===== */
        @media (max-width: 600px) {
            .info p {
                flex: 1 1 100%;
            }

            table th, table td {
                font-size: 14px;
            }

            .total {
                font-size: 16px;
            }
        }

        /* ===== Impression PDF ===== */
        @media print {
            body {
                background-color: white;
            }
            .receipt-container {
                box-shadow: none;
                border: 1px solid #ccc;
                margin: 0;
                padding: 20px;
            }
            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <!-- Nom de la boutique et logo -->
        <div class="shop-info">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Tech Vente">
            <h1>Tech Vente</h1>
            <p>Vente de smartphones & accessoires</p>
        </div>

        <h2>🧾 Reçu de Vente</h2>

        <!-- Informations client / vente -->
        <div class="info">
            <p><strong>ID Vente :</strong> {{ $sale->id }}</p>
            <p><strong>Date :</strong> {{ $sale->sale_date }}</p>
            <p><strong>Client :</strong> {{ $sale->client->name }}</p>
            <p><strong>Email :</strong> {{ $sale->client->email }}</p>
        </div>

        <!-- Produits -->
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Qté</th>
                    <th>Prix</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->orderLines as $line)
                <tr>
                    <td>{{ $line->product->name }}</td>
                    <td>{{ $line->quantity }}</td>
                    <td>{{ number_format($line->price, 0, ',', ' ') }} FCFA</td>
                    <td>{{ number_format($line->price * $line->quantity, 0, ',', ' ') }} FCFA</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total général -->
        <div class="total">
            Total : {{ number_format($sale->total_amount, 0, ',', ' ') }} FCFA
        </div>

        <!-- Merci -->
       <div class="thank-you">
            Merci pour votre confiance ! 🙏
        </div>

        <!-- Bouton impression -->
        <div class="btn-print">
            <button onclick="window.print()">🖨️ Imprimer / PDF</button>
        </div>
    </div>
</body>
</html>
