<?php

namespace App\Http\Controllers;

use App\Models\StockData;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $stocks = StockData::where('symbol', 'like', "%{$query}%")
            ->select('symbol')
            ->distinct()
            ->limit(10)
            ->get();

        return response()->json($stocks);
    }

    public function show($symbol)
    {
        $stockData = StockData::where('symbol', $symbol)
            ->orderBy('date', 'desc')
            ->limit(30)
            ->get();

        return view('stocks.show', compact('symbol', 'stockData'));
    }

    public function getHistoricalData($symbol, Request $request)
    {
        $period = $request->input('period', '1m');
        
        $stockData = StockData::where('symbol', $symbol)
            ->when($period === '1d', function($query) {
                return $query->where('date', today());
            })
            ->when($period === '1w', function($query) {
                return $query->where('date', '>=', now()->subWeek());
            })
            ->when($period === '1m', function($query) {
                return $query->where('date', '>=', now()->subMonth());
            })
            ->when($period === '1y', function($query) {
                return $query->where('date', '>=', now()->subYear());
            })
            ->orderBy('date')
            ->get();

        return response()->json($stockData);
    }
}
