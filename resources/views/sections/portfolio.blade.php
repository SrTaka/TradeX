{{-- resources/views/portfolio.blade.php --}}
@php
    $portfolioStocks = $portfolioStocks ?? [
        [
            'symbol' => 'DLTA',
            'name' => 'Delta Corp',
            'shares' => 100,
            'avgCost' => 280.50,
            'currentPrice' => 312.50,
            'marketValue' => 31250.00,
            'gain' => 3200.00,
        ],
        [
            'symbol' => 'ECOZ',
            'name' => 'Econet Wireless',
            'shares' => 200,
            'avgCost' => 165.75,
            'currentPrice' => 178.25,
            'marketValue' => 35650.00,
            'gain' => 2500.00,
        ],
        [
            'symbol' => 'INNH',
            'name' => 'Innscor Africa',
            'shares' => 50,
            'avgCost' => 400.00,
            'currentPrice' => 423.00,
            'marketValue' => 21150.00,
            'gain' => 1150.00,
        ],
    ];

    $totalValue = collect($portfolioStocks)->sum('marketValue');
    $totalGain = collect($portfolioStocks)->sum('gain');
    $totalGainPercent = ($totalGain / ($totalValue - $totalGain)) * 100;

    $portfolioAllocation = collect($portfolioStocks)->map(function ($stock) {
        return ['name' => $stock['symbol'], 'value' => $stock['marketValue']];
    })->toArray();

    $COLORS = ['#0088FE', '#00C49F', '#FFBB28', '#FF8042', '#8884d8', '#82ca9d'];

    $performanceData = [
        ['month' => 'Jan', 'value' => 500000],
        ['month' => 'Feb', 'value' => 520000], 
        ['month' => 'Mar', 'value' => 510000],
        ['month' => 'Apr', 'value' => 540000],
        ['month' => 'May', 'value' => 533450],
    ];

    $transactionHistory = [
        ['date' => "12 May 2025", 'type' => "Buy", 'symbol' => "DLTA", 'shares' => 100, 'price' => 312.50, 'total' => 31250],
        ['date' => "05 May 2025", 'type' => "Sell", 'symbol' => "PPCZ", 'shares' => 200, 'price' => 126.00, 'total' => 25200],
        ['date' => "28 Apr 2025", 'type' => "Buy", 'symbol' => "SEED", 'shares' => 500, 'price' => 88.50, 'total' => 44250],
        ['date' => "15 Apr 2025", 'type' => "Buy", 'symbol' => "INNH", 'shares' => 150, 'price' => 415.25, 'total' => 62287.50],
        ['date' => "03 Apr 2025", 'type' => "Sell", 'symbol' => "ECOZ", 'shares' => 300, 'price' => 185.75, 'total' => 55725],
    ];
@endphp

<x-app-layout>
    <div class="py-6 md:pl-64">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Portfolio Tracking</h2>
            
            <!-- Portfolio Summary -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Total Value</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold">$125,432.89</span>
                        <span class="text-green-600">+2.34%</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Daily Change</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold">$2,876.54</span>
                        <span class="text-green-600">+1.87%</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">YTD Return</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold">$15,678.90</span>
                        <span class="text-green-600">+14.32%</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Total Return</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold">$45,678.90</span>
                        <span class="text-green-600">+57.32%</span>
                    </div>
                </div>
            </div>

            <!-- Portfolio Performance Chart -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="text-lg font-semibold mb-4">Portfolio Performance</h3>
                <canvas id="portfolioPerformanceChart" class="w-full h-64"></canvas>
            </div>

            <!-- Holdings Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold">Current Holdings</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shares</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Avg Cost</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Current Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Market Value</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unrealized P/L</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">% of Portfolio</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">DLTA</div>
                                        <div class="ml-2 text-sm text-gray-500">Delta Corp</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">100</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$280.50</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$312.50</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$31,250.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">+$3,200.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">24.92%</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">ECOZ</div>
                                        <div class="ml-2 text-sm text-gray-500">Econet Wireless</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">200</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$165.75</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$178.25</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$35,650.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">+$2,500.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">28.43%</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">INNH</div>
                                        <div class="ml-2 text-sm text-gray-500">Innscor Africa</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">50</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$400.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$423.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$21,150.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">+$1,150.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">16.87%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const ctx = document.getElementById('portfolioPerformanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Portfolio Value',
                    data: [100000, 105000, 108000, 112000, 118000, 125432],
                    borderColor: 'rgb(59, 130, 246)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    </script>
    @endpush
</x-app-layout>