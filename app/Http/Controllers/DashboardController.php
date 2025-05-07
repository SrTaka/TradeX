<?php

namespace App\Http\Controllers;

use App\Models\StockData;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $watchlists = $user->watchlists()->with('stocks')->get();
        $latestStockData = StockData::whereIn('symbol', function($query) use ($user) {
            $query->select('symbol')
                ->from('watchlist_stocks')
                ->join('watchlists', 'watchlists.id', '=', 'watchlist_stocks.watchlist_id')
                ->where('watchlists.user_id', $user->id);
        })
        ->where('date', today())
        ->get();

        return view('dashboard', compact('watchlists', 'latestStockData'));
    }

    public function getStockData(Request $request)
    {
        $symbol = $request->input('symbol');
        $period = $request->input('period', '1d');

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
            ->orderBy('date')
            ->get();

        return response()->json($stockData);
    }
}
