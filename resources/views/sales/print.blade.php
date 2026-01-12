<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture Vente #{{ $sale->id }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h1 {
            text-align: center;
            color: #166534;
        }
        .info {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        table th {
            background-color: #f3f4f6;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 13px;
            color: #555;
        }
        .print-btn {
            margin-top: 20px;
            text-align: center;
        }
        .print-btn button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<h1>🧾 FACTURE DE VENTE</h1>

<div class="info">
    <strong>Client :</strong> {{ $sale->client->name ?? '-' }}<br>
    <strong>Date :</strong> {{ \Carbon\Carbon::parse($sale->sale_date)->format('d/m/Y') }}<br>
    <strong>Numéro de vente :</strong> #{{ $sale->id }}
</div>

<table>
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sale->orderLines as $line)
        <tr>
            <td>{{ $line->product->name }}</td>
            <td>{{ $line->quantity }}</td>
            <td>{{ number_format($line->product->price, 0, ',', ' ') }} FCFA</td>
            <td>
                {{ number_format($line->quantity * $line->product->price, 0, ',', ' ') }} FCFA
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="total">
    Montant total : {{ number_format($sale->total_amount, 0, ',', ' ') }} FCFA
</div>

<div class="print-btn">
    <button onclick="window.print()">🖨️ Imprimer</button>
</div>

<div class="footer">
    © {{ date('Y') }} TechVente – Tous droits réservés
</div>

</body>
</html>
