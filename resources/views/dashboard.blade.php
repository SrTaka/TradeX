<x-app-layout>
    <div class="flex">
        <!-- Sidebar -->
        <x-sidebar />
        
        <!-- Main Content -->
        <div class="flex-1 pt-16 transition-all duration-200 bg-gray-50 min-h-screen">
            <div class="py-6 px-2 sm:px-4 lg:px-8 max-w-screen-xl mx-auto w-full">
                <div class="flex flex-col lg:flex-row gap-6 overflow-x-auto w-full">
                    <!-- Main Dashboard Content -->
                    <div class="flex-1 min-w-0">
                        <div>
                            <span style="font-weight: bold; color: #2563eb; font-size: 2rem;">TradeX</span>
                            <p class="text-gray-600 text-sm mt-1">Your personal guide to investing on the Zimbabwe Stock Exchange</p>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6 mb-6 w-full">
                            <h2 class="text-lg font-semibold mb-2">ZSE All Share Index</h2>
                            <canvas id="zseIndexChart" class="w-full h-48"></canvas>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6 mb-6 w-full">
                            <h2 class="text-lg font-semibold mb-2">Top Performers</h2>
                            @php
                                $showDummyTopPerformers = !isset($zseTop10) || !count($zseTop10);
                                $dummyTopPerformers = [
                                    ['symbol' => 'DLTA.ZW', 'close' => 10800, 'open' => 10000],
                                    ['symbol' => 'ECO.ZW', 'close' => 10700, 'open' => 10200],
                                    ['symbol' => 'CBZ.ZW', 'close' => 10600, 'open' => 10150],
                                    ['symbol' => 'OKZ.ZW', 'close' => 10500, 'open' => 10300],
                                    ['symbol' => 'INN.ZW', 'close' => 10400, 'open' => 10400],
                                ];
                            @endphp
                            @if(!$showDummyTopPerformers)
                                @php
                                    $topPerformers = $zseTop10->sortByDesc('close')->take(5);
                                @endphp
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Symbol</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Close</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">% Change</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($topPerformers as $data)
                                                <tr>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data->symbol }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data->close }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap {{ ($data->close - $data->open) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                                        @if($data->open > 0)
                                                            {{ number_format((($data->close - $data->open) / $data->open) * 100, 2) }}%
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Symbol</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Close</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">% Change</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($dummyTopPerformers as $data)
                                                <tr>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data['symbol'] }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data['close'] }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap {{ ($data['close'] - $data['open']) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                                        @if($data['open'] > 0)
                                                            {{ number_format((($data['close'] - $data['open']) / $data['open']) * 100, 2) }}%
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        <div class="bg-white rounded-lg shadow p-6 mb-6 w-full">
                            <h2 class="text-lg font-semibold mb-2">ZSE Top 10</h2>
                            @php
                                $showDummyZseTop10 = !isset($zseTop10) || !count($zseTop10);
                                $dummyZseTop10 = [
                                    ['symbol' => 'DLTA.ZW', 'open' => 10000, 'high' => 10900, 'low' => 9900, 'close' => 10800, 'volume' => 12000],
                                    ['symbol' => 'ECO.ZW', 'open' => 10200, 'high' => 10800, 'low' => 10100, 'close' => 10700, 'volume' => 11000],
                                    ['symbol' => 'CBZ.ZW', 'open' => 10150, 'high' => 10700, 'low' => 10000, 'close' => 10600, 'volume' => 9000],
                                    ['symbol' => 'OKZ.ZW', 'open' => 10300, 'high' => 10600, 'low' => 10200, 'close' => 10500, 'volume' => 8500],
                                    ['symbol' => 'INN.ZW', 'open' => 10400, 'high' => 10500, 'low' => 10300, 'close' => 10400, 'volume' => 8000],
                                    ['symbol' => 'BAT.ZW', 'open' => 9800, 'high' => 10400, 'low' => 9700, 'close' => 10300, 'volume' => 7500],
                                    ['symbol' => 'SEED.ZW', 'open' => 9700, 'high' => 10200, 'low' => 9600, 'close' => 10100, 'volume' => 7000],
                                    ['symbol' => 'OML.ZW', 'open' => 9600, 'high' => 10000, 'low' => 9500, 'close' => 9900, 'volume' => 6500],
                                    ['symbol' => 'FBC.ZW', 'open' => 9500, 'high' => 9800, 'low' => 9400, 'close' => 9700, 'volume' => 6000],
                                    ['symbol' => 'ZBFH.ZW', 'open' => 9400, 'high' => 9700, 'low' => 9300, 'close' => 9600, 'volume' => 5500],
                                ];
                                $zseTop10ForChart = $showDummyZseTop10 ? collect($dummyZseTop10) : $zseTop10;
                            @endphp
                            @if(!$showDummyZseTop10)
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Symbol</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Open</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">High</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Low</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Close</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Volume</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($zseTop10 as $data)
                                                <tr>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data->symbol }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data->open }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data->high }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data->low }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data->close }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data->volume }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Symbol</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Open</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">High</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Low</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Close</th>
                                                <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase tracking-wider">Volume</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($dummyZseTop10 as $data)
                                                <tr>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data['symbol'] }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data['open'] }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data['high'] }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data['low'] }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data['close'] }}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap">{{ $data['volume'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            <div class="mt-8">
                                <h3 class="text-md font-semibold mb-2">ZSE Top 10 Closing Prices</h3>
                                <canvas id="zseTop10BarChart" class="w-full h-48"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Card -->
                    <div class="w-full max-w-xs flex-shrink-0">
                        <div class="bg-white rounded-lg shadow p-6 mb-6 w-full">
                            <form class="flex mb-4">
                                <input type="text" placeholder="Search stocks..." class="flex-1 border border-gray-300 rounded-l px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200" />
                                <button type="button" class="bg-green-700 text-white px-4 py-2 rounded-r hover:bg-green-800">Get Recommendations</button>
                            </form>
                            <h3 class="text-md font-semibold mb-2">Market Overview</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="font-medium">ZSE All Share</span>
                                    <span class="font-bold text-gray-800">32,456.78</span>
                                </div>
                                <div class="flex justify-between text-xs text-green-600">
                                    <span>+234.56</span>
                                    <span>+0.73%</span>
                                </div>
                                <div class="flex justify-between text-sm mt-2">
                                    <span class="font-medium">ZSE Top 10</span>
                                    <span class="font-bold text-gray-800">8,765.43</span>
                                </div>
                                <div class="flex justify-between text-xs text-red-600">
                                    <span>-123.45</span>
                                    <span>-1.39%</span>
                                </div>
                                <div class="flex justify-between text-sm mt-2">
                                    <span class="font-medium">ZSE Top 15</span>
                                    <span class="font-bold text-gray-800">12,345.67</span>
                                </div>
                                <div class="flex justify-between text-xs text-green-600">
                                    <span>+98.76</span>
                                    <span>+0.81%</span>
                                </div>
                            </div>
                            <div class="mt-4 text-right">
                                <a href="#" class="text-blue-600 text-xs hover:underline">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // ZSE All Share Index Chart
    let zseLabels = @json($zseIndexData->pluck('date')->map(fn($d) => \Carbon\Carbon::parse($d)->format('M d'))->toArray());
    let zseData = @json($zseIndexData->pluck('close')->toArray());
    if (!zseLabels.length || !zseData.length) {
        zseLabels = ['May 01', 'May 02', 'May 03', 'May 04', 'May 05', 'May 06', 'May 07', 'May 08', 'May 09', 'May 10'];
        zseData = [10000, 10200, 10150, 10300, 10400, 10500, 10450, 10600, 10700, 10800];
    }
    const ctx = document.getElementById('zseIndexChart').getContext('2d');
    // Create a gradient for the line chart
    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(75,192,192,0.4)');
    gradient.addColorStop(1, 'rgba(75,192,192,0.05)');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: zseLabels,
            datasets: [{
                label: 'ZSE All Share Index',
                data: zseData,
                borderColor: '#2563eb',
                backgroundColor: gradient,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#2563eb',
                pointRadius: 5,
                pointHoverRadius: 7,
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                y: { beginAtZero: false }
            }
        }
    });

    // ZSE Top 10 Bar Chart
    let zseTop10Data = @json($zseTop10ForChart->pluck('close')->toArray());
    let zseTop10Labels = @json($zseTop10ForChart->pluck('symbol')->toArray());
    if (!zseTop10Labels.length || !zseTop10Data.length) {
        zseTop10Labels = ['DLTA.ZW', 'ECO.ZW', 'CBZ.ZW', 'OKZ.ZW', 'INN.ZW', 'BAT.ZW', 'SEED.ZW', 'OML.ZW', 'FBC.ZW', 'ZBFH.ZW'];
        zseTop10Data = [10800, 10700, 10600, 10500, 10400, 10300, 10100, 9900, 9700, 9600];
    }
    const barColors = [
        '#2563eb', '#22d3ee', '#f59e42', '#f43f5e', '#a3e635',
        '#fbbf24', '#6366f1', '#14b8a6', '#eab308', '#f472b6'
    ];
    const barCtx = document.getElementById('zseTop10BarChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: zseTop10Labels,
            datasets: [{
                label: 'Closing Price',
                data: zseTop10Data,
                backgroundColor: barColors,
                borderRadius: 8,
                borderWidth: 2,
                borderColor: '#fff',
                hoverBackgroundColor: barColors.map(c => c + 'cc')
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                y: { beginAtZero: false }
            }
        }
    });
</script>
@endpush