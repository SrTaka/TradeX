<div
    x-show="$store.modals.marketOverview"
    x-transition
    @keydown.escape.window="$store.modals.marketOverview = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
    style="display: none;"
    x-data="{
        init() {
            this.$watch('$store.modals.marketOverview', value => {
                if (value) {
                    this.$nextTick(() => {
                        if (!document.getElementById('tradingview_widget_modal').innerHTML.trim()) {
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
                                "container_id": "tradingview_widget_modal"
                            });
                        }
                    });
                } else {
                    document.getElementById('tradingview_widget_modal').innerHTML = '';
                }
            });
        }
    }"
    x-init="init()"
>
    <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl relative">
        <button @click="$store.modals.marketOverview = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="p-6">
            <div id="tradingview_widget_modal"></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Only initialize the widget when the modal is shown
    document.addEventListener('market-overview', function () {
        setTimeout(function() {
            if (!document.getElementById('tradingview_widget_modal').innerHTML.trim()) {
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
                    "container_id": "tradingview_widget_modal"
                });
            }
        }, 100);
    });
</script>
@endpush 