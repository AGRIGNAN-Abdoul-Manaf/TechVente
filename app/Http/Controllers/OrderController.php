<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    // Historique commandes du client
    public function index()
    {
        $orders = auth()->user()->orders; // relation orders à définir dans User
        return view('client.orders.index', compact('orders'));
    }

    // Passer une commande
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        // Crée la commande
        $order = auth()->user()->orders()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price * $request->quantity,
        ]);

        return redirect()->route('client.orders')->with('success', 'Commande passée avec succès !');
    }
}
