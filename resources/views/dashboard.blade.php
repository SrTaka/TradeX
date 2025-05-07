<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Stock Search -->
                    <div class="mb-6">
                        <input type="text" id="stockSearch" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Search stocks...">
                        <div id="searchResults" class="mt-2 hidden"></div>
                    </div>

                    <!-- TradingView Widget -->
                    <div class="mb-6">
                        <div id="tradingview_widget"></div>
                    </div>

                    <!-- Watchlists -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">Your Watchlists</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($watchlists as $watchlist)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <h4 class="font-medium mb-2">{{ $watchlist->name }}</h4>
                                    <div class="space-y-2">
                                        @foreach($watchlist->stocks as $stock)
                                            <div class="flex justify-between items-center">
                                                <span>{{ $stock->symbol }}</span>
                                                <button class="text-red-600 hover:text-red-800" onclick="removeFromWatchlist({{ $watchlist->id }}, {{ $stock->id }})">
                                                    Remove
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- End of Day Data -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-4">End of Day Data</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Symbol</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Open</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">High</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Low</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Close</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Volume</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($latestStockData as $data)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $data->symbol }}</td>
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
    </div>

    @push('scripts')
    <script>
        // Initialize TradingView Widget
        new TradingView.widget({
            "width": "100%",
            "height": 500,
            "symbol": "NASDAQ:AAPL",
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

        // Stock Search
        const searchInput = document.getElementById('stockSearch');
        const searchResults = document.getElementById('searchResults');

        searchInput.addEventListener('input', debounce(async (e) => {
            const query = e.target.value;
            if (query.length < 2) {
                searchResults.classList.add('hidden');
                return;
            }

            try {
                const response = await fetch(`/stocks/search?query=${query}`);
                const data = await response.json();
                
                searchResults.innerHTML = data.map(stock => `
                    <div class="p-2 hover:bg-gray-100 cursor-pointer" onclick="addToWatchlist('${stock.symbol}')">
                        ${stock.symbol}
                    </div>
                `).join('');
                
                searchResults.classList.remove('hidden');
            } catch (error) {
                console.error('Error searching stocks:', error);
            }
        }, 300));

        // Debounce function
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Add to watchlist
        async function addToWatchlist(symbol) {
            try {
                const response = await fetch('/watchlists', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ name: 'My Watchlist', symbol })
                });
                
                if (response.ok) {
                    window.location.reload();
                }
            } catch (error) {
                console.error('Error adding to watchlist:', error);
            }
        }

        // Remove from watchlist
        async function removeFromWatchlist(watchlistId, stockId) {
            try {
                const response = await fetch(`/watchlists/${watchlistId}/stocks/${stockId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                
                if (response.ok) {
                    window.location.reload();
                }
            } catch (error) {
                console.error('Error removing from watchlist:', error);
            }
        }
    </script>
    @endpush
</x-app-layout>
