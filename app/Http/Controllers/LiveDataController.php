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

        // Provide dummy data if empty
        if ($watchlists->isEmpty()) {
            $watchlists = collect([
                (object)[
                    'name' => 'Demo Watchlist',
                    'stocks' => collect([
                        (object)['symbol' => 'DLTA.ZW'],
                        (object)['symbol' => 'ECO.ZW'],
                    ])
                ]
            ]);
        }
        if ($latestStockData->isEmpty()) {
            $latestStockData = collect([
                (object)['symbol' => 'DLTA.ZW', 'open' => 10000, 'high' => 10900, 'low' => 9900, 'close' => 10800, 'volume' => 12000],
                (object)['symbol' => 'ECO.ZW', 'open' => 10200, 'high' => 10800, 'low' => 10100, 'close' => 10700, 'volume' => 11000],
            ]);
        }
        $stock = $latestStockData->first();

        return view('stock-index', compact('watchlists', 'latestStockData', 'stock'));
    }
} 