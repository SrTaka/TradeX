<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-3xl font-bold text-zimstock-blue">Live Market Data</h2>
        <span class="text-sm bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium flex items-center">
            <span class="w-2 h-2 bg-green-600 rounded-full mr-2 animate-pulse"></span>
            Live Updates
        </span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 space-y-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="flex items-center">
                                <select wire:model="selectedStock" class="w-[180px] rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">
                                    <option value="">Select stock</option>
                                    <option value="DLTA">DLTA - Delta Corp</option>
                                    <option value="ECOZ">ECOZ - Econet Wireless</option>
                                    <option value="INNH">INNH - Innscor Africa</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <h2 class="text-2xl font-bold">{{ $selectedStockData['name'] ?? '' }}</h2>
                                <p class="text-sm text-muted-foreground">{{ $selectedStockData['sector'] ?? '' }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold">${{ number_format($selectedStockData['price'] ?? 0, 2) }}</p>
                            <div class="flex items-center justify-end {{ ($selectedStockData['change'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                <span>{{ ($selectedStockData['change'] ?? 0) >= 0 ? '+' : '' }}{{ number_format($selectedStockData['change'] ?? 0, 2) }}</span>
                                <span class="ml-2">({{ ($selectedStockData['changePercent'] ?? 0) >= 0 ? '+' : '' }}{{ number_format($selectedStockData['changePercent'] ?? 0, 2) }}%)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="flex justify-end space-x-2 mb-4">
                        <button wire:click="$set('timeRange', '1d')" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 px-4 py-2 {{ $timeRange === '1d' ? '' : 'bg-transparent border border-input' }}">
                            1D
                        </button>
                        <button wire:click="$set('timeRange', '1w')" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 px-4 py-2 {{ $timeRange === '1w' ? '' : 'bg-transparent border border-input' }}">
                            1W
                        </button>
                        <button wire:click="$set('timeRange', '1m')" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 px-4 py-2 {{ $timeRange === '1m' ? '' : 'bg-transparent border border-input' }}">
                            1M
                        </button>
                    </div>

                    <div class="h-[300px]">
                        {{-- Assuming you have a Blade component or a way to render the chart data in Blade --}}
                        {{-- <livewire:stock-chart :title="''" :data="$priceData" :color="$isPositive ? '#48bb78' : '#f56565'" /> --}}
                        <p class="text-center text-muted-foreground">Stock chart will be rendered here.</p>
                        <pre><code>{{ json_encode($priceData) }}</code></pre>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                        <div>
                            <p class="text-sm text-muted-foreground">Open</p>
                            <p class="font-medium">${{ number_format($selectedStockData['open'] ?? 0, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-muted-foreground">High</p>
                            <p class="font-medium">${{ number_format($selectedStockData['high'] ?? 0, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-muted-foreground">Low</p>
                            <p class="font-medium">${{ number_format($selectedStockData['low'] ?? 0, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-muted-foreground">Previous Close</p>
                            <p class="font-medium">${{ number_format($selectedStockData['previousClose'] ?? 0, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-muted-foreground">Volume</p>
                            <p class="font-medium">{{ $selectedStockData['volume'] ?? '' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-muted-foreground">Market Cap</p>
                            <p class="font-medium">${{ $selectedStockData['marketCap'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="card h-full">
                <div class="card-header">
                    <div class="card-title text-lg font-medium">Top Movers</div>
                </div>
                <div class="card-content">
                    <div class="tabs" wire:ignore>
                        <div class="tabs-list mb-4 w-full">
                            <button wire:click="$set('topMoversTab', 'gainers')" class="flex-1 inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-2 text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 data-[state=active]:bg-secondary data-[state=active]:text-secondary-foreground">{{ __('Gainers') }}</button>
                            <button wire:click="$set('topMoversTab', 'losers')" class="flex-1 inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-2 text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 data-[state=active]:bg-secondary data-[state=active]:text-secondary-foreground">{{ __('Losers') }}</button>
                        </div>

                        @if ($topMoversTab === 'gainers')
                            <div class="space-y-4">
                                @foreach ($marketTopMovers->filter(fn($stock) => $stock['change'] > 0) as $stock)
                                    <div class="flex justify-between items-center border-b pb-2">
                                        <div>
                                            <p class="font-medium">{{ $stock['symbol'] }}</p>
                                            <p class="text-sm text-muted-foreground">{{ $stock['name'] }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold">${{ number_format($stock['price'], 2) }}</p>
                                            <p class="text-green-600">+{{ number_format($stock['changePercent'], 2) }}%</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if ($topMoversTab === 'losers')
                            <div class="space-y-4">
                                @foreach ($marketTopMovers->filter(fn($stock) => $stock['change'] < 0) as $stock)
                                    <div class="flex justify-between items-center border-b pb-2">
                                        <div>
                                            <p class="font-medium">{{ $stock['symbol'] }}</p>
                                            <p class="text-sm text-muted-foreground">{{ $stock['name'] }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold">${{ number_format($stock['price'], 2) }}</p>
                                            <p class="text-red-600">{{ number_format($stock['changePercent'], 2) }}%</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Market Breadth</div>
        </div>
        <div class="card-content">
            <div class="table-responsive">
                <table class="table table-auto w-full">
                    <thead class="[&_th]:px-4 [&_th]:py-2 [&:last-child_th]:text-right">
                        <tr>
                            <th>Index</th>
                            <th>Last</th>
                            <th>Change</th>
                            <th>% Change</th>
                            <th>High</th>
                            <th>Low</th>
                            <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-medium px-4 py-2">ZSE All Share</td>
                            <td class="px-4 py-2">32,456.78</td>
                            <td class="text-green-600 px-4 py-2">+234.56</td>
                            <td class="text-green-600 px-4 py-2">+0.73%</td>
                            <td class="px-4 py-2">32,567.45</td>
                            <td class="px-4 py-2">32,234.12</td>
                            <td class="px-4 py-2">15.4M</td>
                        </tr>
                        <tr>
                            <td class="font-medium px-4 py-2">ZSE Top 10</td>
                            <td class="px-4 py-2">8,765.43</td>
                            <td class="text-red-600 px-4 py-2">-123.45</td>
                            <td class="text-red-600 px-4 py-2">-1.39%</td>
                            <td class="px-4 py-2">8,889.21</td>
                            <td class="px-4 py-2">8,745.32</td>
                            <td class="px-4 py-2">8.2M</td>
                        </tr>
                        <tr>
                            <td class="font-medium px-4 py-2">ZSE Top 15</td>
                            <td class="px-4 py-2">12,345.67</td>
                            <td class="text-green-600 px-4 py-2">+98.76</td>
                            <td class="text-green-600 px-4 py-2">+0.81%</td>
                            <td class="px-4 py-2">12,456.78</td>
                            <td class="px-4 py-2">12,234.56</td>
                            <td class="px-4 py-2">10.7M</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
    $data = [];
    for ($i = 0; $i < $days; $i++) {
        $data[] = [
            'date' => ($i + 1) . '/05',
            'value' => $baseValue + rand(-5, 5) / 100 * $baseValue, // Simulate random fluctuation
        ];
    }
    return $data;
}

$priceData = generatePriceData($selectedStockData['price'] ?? 0, $timeRange === "1d" ? 24 : ($timeRange === "1w" ? 7 : 30));

$marketTopMovers = [
    [ 'symbol' => "SEED", 'name' => "SeedCo Limited", 'price' => 89.75, 'change' => 5.25, 'changePercent' => 6.21 ],
    [ 'symbol' => "ABCH", 'name' => "African Banking Corp", 'price' => 132.40, 'change' => 7.80, 'changePercent' => 6.26 ],
    [ 'symbol' => "AFDS", 'name' => "Afdis", 'price' => 245.30, 'change' => -18.50, 'changePercent' => -7.02 ],
    [ 'symbol' => "MEIK", 'name' => "Meikles Limited", 'price' => 178.65, 'change' => -12.35, 'changePercent' => -6.46 ],
];

@endphp

<script>
    document.addEventListener('livewire:load', function () {
        // You would typically initialize your chart library here with the initial $priceData
        // and set up listeners for when Livewire updates the data.
        // For example, if you are using Chart.js:
        // const ctx = document.getElementById('stockChart').getContext('2d');
        // let myChart = new Chart(ctx, { ... });
        // Livewire.on('update-chart', data => {
        //     myChart.data.datasets[0].data = data.map(item => item.value);
        //     myChart.data.labels = data.map(item => item.date);
        //     myChart.update();
        // });
        console.log('Livewire loaded');
    });
</script>