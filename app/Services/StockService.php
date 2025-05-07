<?php

namespace App\Services;

use App\Models\StockData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class StockService
{
    protected $apiKey;
    protected $baseUrl = 'https://www.alphavantage.co/query';

    public function __construct()
    {
        $this->apiKey = config('services.alphavantage.key');
    }

    public function searchStocks($query)
    {
        $cacheKey = "stock_search_{$query}";
        
        return Cache::remember($cacheKey, now()->addHours(24), function () use ($query) {
            $response = Http::get($this->baseUrl, [
                'function' => 'SYMBOL_SEARCH',
                'keywords' => $query,
                'apikey' => $this->apiKey
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return collect($data['bestMatches'] ?? [])->map(function ($match) {
                    return [
                        'symbol' => $match['1. symbol'],
                        'name' => $match['2. name'],
                        'type' => $match['3. type'],
                        'region' => $match['4. region']
                    ];
                });
            }

            return collect([]);
        });
    }

    public function getDailyData($symbol)
    {
        $cacheKey = "daily_data_{$symbol}";
        
        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($symbol) {
            $response = Http::get($this->baseUrl, [
                'function' => 'TIME_SERIES_DAILY',
                'symbol' => $symbol,
                'apikey' => $this->apiKey
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $timeSeries = $data['Time Series (Daily)'] ?? [];

                foreach ($timeSeries as $date => $values) {
                    StockData::updateOrCreate(
                        ['symbol' => $symbol, 'date' => $date],
                        [
                            'open' => $values['1. open'],
                            'high' => $values['2. high'],
                            'low' => $values['3. low'],
                            'close' => $values['4. close'],
                            'volume' => $values['5. volume']
                        ]
                    );
                }

                return StockData::where('symbol', $symbol)
                    ->orderBy('date', 'desc')
                    ->get();
            }

            return collect([]);
        });
    }

    public function getIntradayData($symbol)
    {
        $cacheKey = "intraday_data_{$symbol}";
        
        return Cache::remember($cacheKey, now()->addMinutes(1), function () use ($symbol) {
            $response = Http::get($this->baseUrl, [
                'function' => 'TIME_SERIES_INTRADAY',
                'symbol' => $symbol,
                'interval' => '5min',
                'apikey' => $this->apiKey
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['Time Series (5min)'] ?? [];
            }

            return [];
        });
    }
} 