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

        // ZSE Top 10 symbols (example, update as needed)
        $zseTop10Symbols = [
            'DLTA.ZW', 'ECO.ZW', 'CBZ.ZW', 'OKZ.ZW', 'INN.ZW',
            'BAT.ZW', 'SEED.ZW', 'OML.ZW', 'FBC.ZW', 'ZBFH.ZW'
        ];
        $zseTop10 = StockData::whereIn('symbol', $zseTop10Symbols)
            ->where('date', today())
            ->orderByRaw("FIELD(symbol, 'DLTA.ZW', 'ECO.ZW', 'CBZ.ZW', 'OKZ.ZW', 'INN.ZW', 'BAT.ZW', 'SEED.ZW', 'OML.ZW', 'FBC.ZW', 'ZBFH.ZW')")
            ->get();

        // Example: Fetch last 30 days of ZSE All Share Index
        $zseIndexData = StockData::where('symbol', 'ZSE_ALL_SHARE')
            ->orderBy('date')
            ->where('date', '>=', now()->subDays(30))
            ->get(['date', 'close']);

        return view('dashboard', compact('watchlists', 'latestStockData', 'zseTop10', 'zseIndexData'));
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
