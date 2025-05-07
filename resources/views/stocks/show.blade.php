<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $symbol }} - Stock Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- TradingView Widget -->
                    <div class="mb-6">
                        <div id="tradingview_widget"></div>
                    </div>

                    <!-- Historical Data Chart -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">Historical Data</h3>
                            <div class="space-x-2">
                                <button onclick="updateChart('1d')" class="px-3 py-1 bg-gray-100 rounded hover:bg-gray-200">1D</button>
                                <button onclick="updateChart('1w')" class="px-3 py-1 bg-gray-100 rounded hover:bg-gray-200">1W</button>
                                <button onclick="updateChart('1m')" class="px-3 py-1 bg-gray-100 rounded hover:bg-gray-200">1M</button>
                                <button onclick="updateChart('1y')" class="px-3 py-1 bg-gray-100 rounded hover:bg-gray-200">1Y</button>
                            </div>
                        </div>
                        <canvas id="historicalChart"></canvas>
                    </div>

                    <!-- Historical Data Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Open</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">High</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Low</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Close</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Volume</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($stockData as $data)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $data->date->format('Y-m-d') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $data->open }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $data->high }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $data->low }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $data->close }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $data->volume }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Initialize TradingView Widget
        new TradingView.widget({
            "width": "100%",
            "height": 500,
            "symbol": "{{ $symbol }}",
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

        // Initialize Chart.js
        let historicalChart;
        const ctx = document.getElementById('historicalChart').getContext('2d');

        async function updateChart(period) {
            try {
                const response = await fetch(`/stocks/{{ $symbol }}/historical?period=${period}`);
                const data = await response.json();
                
                const chartData = {
                    labels: data.map(item => item.date),
                    datasets: [{
                        label: 'Close Price',
                        data: data.map(item => item.close),
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                };

                if (historicalChart) {
                    historicalChart.destroy();
                }

                historicalChart = new Chart(ctx, {
                    type: 'line',
                    data: chartData,
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: false
                            }
                        }
                    }
                });
            } catch (error) {
                console.error('Error fetching historical data:', error);
            }
        }

        // Load initial chart data
        updateChart('1m');
    </script>
    @endpush
</x-app-layout> 