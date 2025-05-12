        // TradingView Widget
        function loadTradingViewWidget() {
            if (document.getElementById('tradingview_widget')) {
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
            }
        }

        // Call on initial page load
        loadTradingViewWidget();

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

        
