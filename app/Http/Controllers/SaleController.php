<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Models\OrderLine;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Liste des ventes
    public function index()
    {
        $sales = Sale::with('client', 'user', 'orderLines.product')->paginate(10);
        return view('sales.index', compact('sales'));
    }

    // Formulaire création
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('sales.create', compact('clients', 'products'));
    }

    // Enregistrement d'une nouvelle vente
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'products' => 'required|array',
            'quantities' => 'required|array',
            'payment_method' => 'required|in:cash,card,mobile_money',
        ]);

        $total = 0;
        foreach ($request->products as $productId) {
            $product = Product::find($productId);
            $qty = $request->quantities[$productId] ?? 0;
            $total += $product->price * $qty;
        }

        $sale = Sale::create([
            'client_id' => $request->client_id,
            'user_id' => Auth::id(),
            'total_amount' => $total,
            'payment_method' => $request->payment_method,
            'sale_date' => now(),
        ]);

        foreach ($request->products as $productId) {
            $product = Product::find($productId);
            $qty = $request->quantities[$productId] ?? 0;

            OrderLine::create([
                'sale_id' => $sale->id,
                'product_id' => $product->id,
                'quantity' => $qty,
                'price' => $product->price,
            ]);

            $product->decrement('stock', $qty);
        }

        return redirect()->route('sales.index')->with('success', 'Vente enregistrée avec succès.');
    }

    // Modifier une vente
    public function edit(Sale $sale)
    {
        $clients = Client::all();
        $products = Product::all();
        return view('sales.edit', compact('sale', 'clients', 'products'));
    }

    // Mise à jour
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'products' => 'required|array',
            'quantities' => 'required|array',
            'payment_method' => 'required|in:cash,card,mobile_money',
        ]);

        $total = 0;
        foreach ($request->products as $productId) {
            $product = Product::find($productId);
            $qty = $request->quantities[$productId] ?? 0;
            $total += $product->price * $qty;
        }

        $sale->update([
            'client_id' => $request->client_id,
            'total_amount' => $total,
            'payment_method' => $request->payment_method,
        ]);

        $sale->orderLines()->delete();

        foreach ($request->products as $productId) {
            $product = Product::find($productId);
            $qty = $request->quantities[$productId] ?? 0;

            OrderLine::create([
                'sale_id' => $sale->id,
                'product_id' => $product->id,
                'quantity' => $qty,
                'price' => $product->price,
            ]);

            $product->decrement('stock', $qty);
        }

        return redirect()->route('sales.index')->with('success', 'La vente a été mise à jour.');
    }

    // Suppression
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'La vente a été supprimée.');
    }

    // Reçu
    public function receipt($id)
    {
        $sale = Sale::with('client', 'orderLines.product')->findOrFail($id);
        return view('sales.receipt', compact('sale'));
    }

    // Impression
    public function print($id)
    {
        $sale = Sale::with('client', 'orderLines.product')->findOrFail($id);
        return view('sales.print', compact('sale'));
    }
}
