{{-- Debug output --}}
@if($latestStockData->isEmpty())
    <div class="text-red-500">No stock data found.</div>
@endif
@if(empty($stock))
    <div class="text-red-500">No stock selected for details.</div>
@endif

<div class="p-4 bg-white rounded-lg shadow w-full max-w-3xl mx-auto">
    <h2 class="text-lg font-bold mb-4">Live Data - Candlestick Chart</h2>
    <div class="w-full" style="min-height:400px;">
        <canvas id="candlestickChart"></canvas>
    </div>
    <div class="w-full mt-6" style="min-height:120px;">
        <canvas id="volumeChart"></canvas>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-chart-financial"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const candlestickData = @json($latestStockData->map(function($data) {
        return [
            'x' => $data->date,
            'o' => $data->open,
            'h' => $data->high,
            'l' => $data->low,
            'c' => $data->close
        ];
    }));

    const volumeData = @json($latestStockData->pluck('volume'));

    const ctx = document.getElementById('candlestickChart');
    if (ctx) {
        const candlestickChart = new Chart(ctx, {
            type: 'candlestick',
            data: {
                datasets: [{
                    label: '{{ $stock->symbol ?? "Stock Price" }}',
                    data: candlestickData,
                    color: {
                        up: '#26a69a',
                        down: '#ef5350',
                        unchanged: '#757575'
                    }
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    x: { 
                        type: 'time',
                        time: { 
                            unit: 'day',
                            displayFormats: {
                                day: 'MMM d'
                            }
                        }
                    },
                    y: {
                        type: 'linear',
                        position: 'right'
                    }
                }
            }
        });
    }

    const vctx = document.getElementById('volumeChart');
    if (vctx) {
        new Chart(vctx, {
            type: 'bar',
            data: {
                labels: candlestickData.map(d => d.x),
                datasets: [{
                    label: 'Volume',
                    data: volumeData,
                    backgroundColor: candlestickData.map(d => d.c > d.o ? '#26a69a' : '#ef5350')
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: { display: false },
                    y: { 
                        beginAtZero: true,
                        position: 'right'
                    }
                }
            }
        });
    }
});
</script>
@endpush

@if(!empty($stock))
    @include('stocks.show', ['stock' => $stock])
@endif