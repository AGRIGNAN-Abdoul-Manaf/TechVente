<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de vente #{{ $sale->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .receipt-container { border: 1px solid #ccc; padding: 20px; border-radius: 10px; }
        h2 { text-align: center; }
        .info { margin-bottom: 20px; }
        .btn-print { margin-top: 20px; text-align: center; }
        button { padding: 10px 20px; background-color: #3498db; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="receipt-container">
        <h2>Reçu de Vente</h2>
        <div class="info">
            <p><strong>ID Vente :</strong> {{ $sale->id }}</p>
            <p><strong>Client :</strong> {{ $sale->client->name }}</p>
            <p><strong>Email :</strong> {{ $sale->client->email }}</p>
            <p><strong>Date :</strong> {{ $sale->sale_date }}</p>
            <p><strong>Total :</strong> {{ number_format($sale->total_amount, 0, ',', ' ') }} FCFA</p>
        </div>

        <h4>Produits achetés :</h4>
        <ul>
            @foreach($sale->products as $product)
                <li>{{ $product->name }} — {{ $product->pivot->quantity }} x {{ number_format($product->price, 0, ',', ' ') }} FCFA</li>
            @endforeach
        </ul>

        <div class="btn-print">
            <button onclick="window.print()">🖨️ Imprimer</button>
        </div>
    </div>
</body>
</html>
