<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StockData;

class LiveDataController extends Controller
{
    public function content()
    {
        $user = Auth::user();
        $watchlists = $user ? $user->watchlists()->with('stocks')->get() : collect();
        $latestStockData = StockData::latest('date')->take(20)->get();

        // Get the first stock symbol from the latest stock data
        $firstStockData = $latestStockData->first();
        $stock = null;
        if ($firstStockData) {
            $stock = \App\Models\Stock::where('symbol', $firstStockData->symbol)->first();
        }

        return view('stock-index', compact('watchlists', 'latestStockData', 'stock'));
    }
} 