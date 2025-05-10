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