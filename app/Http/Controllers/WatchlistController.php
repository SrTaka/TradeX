<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\WatchlistStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index()
    {
        $watchlists = Auth::user()->watchlists()->with('stocks')->get();
        return view('watchlists.index', compact('watchlists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $watchlist = Auth::user()->watchlists()->create($request->only(['name', 'description']));

        return response()->json($watchlist);
    }

    public function addStock(Request $request, Watchlist $watchlist)
    {
        $request->validate([
            'symbol' => 'required|string|max:10'
        ]);

        $stock = $watchlist->stocks()->create([
            'symbol' => $request->symbol
        ]);

        return response()->json($stock);
    }

    public function removeStock(Watchlist $watchlist, WatchlistStock $stock)
    {
        $stock->delete();
        return response()->json(['message' => 'Stock removed from watchlist']);
    }

    public function destroy(Watchlist $watchlist)
    {
        $watchlist->delete();
        return response()->json(['message' => 'Watchlist deleted']);
    }
}
