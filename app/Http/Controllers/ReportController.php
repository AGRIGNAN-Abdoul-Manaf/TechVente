<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\OrderLine;
use App\Models\Product;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Période de filtrage (par défaut : ce mois-ci)
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));

        // Requête de base pour les ventes filtrées
        $salesQuery = Sale::whereBetween('sale_date', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);

        // Stats globales sur la période
        $totalVentes = (clone $salesQuery)->sum('total_amount');
        $nombreVentes = (clone $salesQuery)->count();
        
        // Paiements
        $paiementCash = (clone $salesQuery)->where('payment_method', 'cash')->sum('total_amount');
        $paiementCarte = (clone $salesQuery)->where('payment_method', 'card')->sum('total_amount');
        $paiementMobile = (clone $salesQuery)->where('payment_method', 'mobile_money')->sum('total_amount');

        // Graphique : Ventes par jour
        $salesByDate = (clone $salesQuery)
            ->selectRaw('DATE(sale_date) as date, SUM(total_amount) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
            
        $chartLabels = $salesByDate->pluck('date');
        $chartValues = $salesByDate->pluck('total');

        // Meilleurs produits (sur la période)
        // Note: Cela nécessite une jointure plus complexe si on veut filtrer OrderLine par date de Sale.
        // Pour simplifier, on garde les top produits global ou on fait une jointure.
        // Faisons une jointure pour être précis.
        $produitsTop = OrderLine::join('sales', 'order_lines.sale_id', '=', 'sales.id')
            ->whereBetween('sales.sale_date', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->selectRaw('order_lines.product_id, SUM(order_lines.quantity) as total_vendu')
            ->groupBy('order_lines.product_id')
            ->orderByDesc('total_vendu')
            ->with('product') // Eager load sur le modèle Product via OrderLine (relation à définir si non existante, sinon via product_id)
            ->take(5)
            ->get();

        // Ventes récentes (sur la période)
        $ventesRecentes = (clone $salesQuery)->with('client')->latest()->take(10)->get();

        return view('reports.index', compact(
            'startDate',
            'endDate',
            'totalVentes',
            'nombreVentes',
            'paiementCash',
            'paiementCarte',
            'paiementMobile',
            'produitsTop',
            'ventesRecentes',
            'chartLabels',
            'chartValues'
        ));
    }
}
