<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Market Summary</h2>
            
            <!-- Market Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
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

            <!-- Market Breadth Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold">Market Breadth</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Index</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Change</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">% Change</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">High</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Low</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Volume</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ZSE All Share</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">32,456.78</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">+234.56</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">+0.73%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">32,567.45</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">32,234.12</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15.4M</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ZSE Top 10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8,765.43</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600">-123.45</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600">-1.39%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8,889.21</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8,745.32</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8.2M</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ZSE Top 15</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12,345.67</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">+98.76</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">+0.81%</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12,456.78</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12,234.56</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10.7M</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Market Performance Chart -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Market Performance</h3>
                <canvas id="marketPerformanceChart" class="w-full h-64"></canvas>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const ctx = document.getElementById('marketPerformanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'ZSE All Share',
                    data: [31000, 31500, 32000, 31800, 32200, 32456],
                    borderColor: 'rgb(59, 130, 246)',
                    tension: 0.1
                }, {
                    label: 'ZSE Top 10',
                    data: [8500, 8600, 8700, 8650, 8800, 8765],
                    borderColor: 'rgb(16, 185, 129)',
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