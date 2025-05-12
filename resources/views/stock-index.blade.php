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
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation"></script>
<script>
const candlestickData = [
    {x: '2022-04-01', o: 4800, h: 5100, l: 4700, c: 5080},
    {x: '2022-04-02', o: 5080, h: 5200, l: 5000, c: 5150},
    {x: '2022-04-03', o: 5150, h: 5300, l: 5100, c: 5200},
    {x: '2022-04-04', o: 5200, h: 5250, l: 5100, c: 5120},
    {x: '2022-04-05', o: 5120, h: 5200, l: 5000, c: 5050},
    {x: '2022-04-06', o: 5050, h: 5100, l: 4900, c: 4950},
    {x: '2022-04-07', o: 4950, h: 5000, l: 4800, c: 4850},
    {x: '2022-04-08', o: 4850, h: 5100, l: 4800, c: 5080}, // Bullish Engulfing
];

const volumeData = [800, 900, 1200, 1000, 950, 1100, 1050, 1300];

const ctx = document.getElementById('candlestickChart').getContext('2d');
const candlestickChart = new Chart(ctx, {
    type: 'candlestick',
    data: {
        datasets: [{
            label: 'NSE NIFTY',
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
        plugins: {
            annotation: {
                annotations: {
                    trendline: {
                        type: 'line',
                        xMin: 0,
                        xMax: 7,
                        yMin: 5300,
                        yMax: 4850,
                        borderColor: 'blue',
                        borderWidth: 2,
                        label: {
                            enabled: true,
                            content: 'Trend Line',
                            position: 'start'
                        }
                    },
                    breakout: {
                        type: 'label',
                        xValue: '2022-04-08',
                        yValue: 5080,
                        backgroundColor: 'rgba(0,0,255,0.1)',
                        color: 'blue',
                        content: ['Upward Breakout', 'Bullish Engulfing'],
                        font: {size: 12}
                    }
                }
            }
        },
        scales: {
            x: { type: 'time', time: { unit: 'day' } }
        }
    }
});

const vctx = document.getElementById('volumeChart').getContext('2d');
new Chart(vctx, {
    type: 'bar',
    data: {
        labels: candlestickData.map(d => d.x),
        datasets: [{
            label: 'Volume',
            data: volumeData,
            backgroundColor: volumeData.map((v, i) => candlestickData[i].c > candlestickData[i].o ? '#26a69a' : '#ef5350')
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: { display: false },
            y: { beginAtZero: true }
        }
    }
});
</script>
@endpush

@include('stocks.show', ['stock' => $stock]) 