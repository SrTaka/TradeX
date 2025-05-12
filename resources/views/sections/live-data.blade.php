<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Live Market Data</h2>
            
            <!-- TradingView Widget -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <div id="tradingview_widget" class="w-full h-[600px]"></div>
            </div>

            <!-- Market Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">ZSE All Share Index</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold">32,456.78</span>
                        <span class="text-green-600">+234.56 (+0.73%)</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">ZSE Top 10</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold">8,765.43</span>
                        <span class="text-red-600">-123.45 (-1.39%)</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Market Volume</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold">1.2M</span>
                        <span class="text-green-600">+15.4%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script type="text/javascript">
        new TradingView.widget({
            "width": "100%",
            "height": 600,
            "symbol": "ZSE:ZSE",
            "interval": "D",
            "timezone": "Etc/UTC",
            "theme": "light",
            "style": "1",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "allow_symbol_change": true,
            "container_id": "tradingview_widget"
        });
    </script>
    @endpush
</x-app-layout>

@php
$selectedStock = $selectedStock ?? 'DLTA';
$timeRange = $timeRange ?? '1d';

$stocksData = [
    "DLTA" => [
        "name" => "Delta Corporation",
        "sector" => "Beverages", 
        "price" => 312.50,
        "change" => 4.25,
        "changePercent" => 1.38,
        "marketCap" => "38.5B",
        "volume" => "2.3M",
        "open" => 308.25,
        "high" => 315.00,
        "low" => 307.80,
        "previousClose" => 308.25,
    ],
    "ECOZ" => [
        "name" => "Econet Wireless",
        "sector" => "Telecommunications",
        "price" => 178.25,
        "change" => -2.75,
        "changePercent" => -1.52,
        "marketCap" => "45.7B",
        "volume" => "3.1M",
        "open" => 181.00,
        "high" => 181.50,
        "low" => 177.25,
        "previousClose" => 181.00,
    ],
    "INNH" => [
        "name" => "Innscor Africa",
        "sector" => "Food & Retail",
        "price" => 423.00,
        "change" => 8.50,
        "changePercent" => 2.05,
        "marketCap" => "29.8B",
        "volume" => "1.8M",
        "open" => 414.50,
        "high" => 425.25,
        "low" => 414.50,
        "previousClose" => 414.50,
    ]
];

$selectedStockData = $stocksData[$selectedStock] ?? $stocksData['DLTA'];
$isPositive = ($selectedStockData['change'] ?? 0) >= 0;

function generatePriceData($baseValue, $days) {
    return array_map(function($i) use ($baseValue) {
        return [
            'date' => ($i + 1) . '/05',
            'value' => $baseValue + rand(-5, 5) / 100 * $baseValue,
        ];
    }, range(0, $days - 1));
}

$priceData = generatePriceData(
    $selectedStockData['price'] ?? 0, 
    $timeRange === "1d" ? 24 : ($timeRange === "1w" ? 7 : 30)
);

$marketTopMovers = collect([
    ['symbol' => "SEED", 'name' => "SeedCo Limited", 'price' => 89.75, 'change' => 5.25, 'changePercent' => 6.21],
    ['symbol' => "ABCH", 'name' => "African Banking Corp", 'price' => 132.40, 'change' => 7.80, 'changePercent' => 6.26],
    ['symbol' => "AFDS", 'name' => "Afdis", 'price' => 245.30, 'change' => -18.50, 'changePercent' => -7.02],
    ['symbol' => "MEIK", 'name' => "Meikles Limited", 'price' => 178.65, 'change' => -12.35, 'changePercent' => -6.46],
]);
@endphp

<script>
document.addEventListener('livewire:load', function() {
    console.log('Livewire loaded');
});
</script>