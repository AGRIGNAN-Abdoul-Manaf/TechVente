<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\OrderLine;
use App\Models\Product;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        // Total des ventes
        $totalVentes = Sale::sum('total_amount');

        // Nombre total de ventes
        $nombreVentes = Sale::count();

        // Total encaissé par mode de paiement
        $paiementCash = Sale::where('payment_method', 'cash')->sum('total_amount');
        $paiementCarte = Sale::where('payment_method', 'card')->sum('total_amount');
        $paiementMobile = Sale::where('payment_method', 'mobile_money')->sum('total_amount');

        // Meilleurs produits vendus (top 5)
        $produitsTop = OrderLine::selectRaw('product_id, SUM(quantity) as total_vendu')
            ->groupBy('product_id')
            ->orderByDesc('total_vendu')
            ->with('product')
            ->take(5)
            ->get();

        // Ventes récentes
        $ventesRecentes = Sale::with('client')->latest()->take(10)->get();

        return view('reports.index', compact(
            'totalVentes',
            'nombreVentes',
            'paiementCash',
            'paiementCarte',
            'paiementMobile',
            'produitsTop',
            'ventesRecentes'
        ));
    }
}
