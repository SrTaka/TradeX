<div class="space-y-6">
    <div>
        <h2 class="text-3xl font-bold text-zimstock-blue">Market Summary</h2>
        <p class="text-muted-foreground">Comprehensive overview of the Zimbabwe Stock Exchange</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="card">
            <div class="card-header pb-2">
                <div class="card-title text-lg">Total Listed Companies</div>
            </div>
            <div class="card-content">
                <p class="text-3xl font-bold">{{ $marketStats['totalListedCompanies'] }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header pb-2">
                <div class="card-title text-lg">Total Market Capitalization</div>
            </div>
            <div class="card-content">
                <p class="text-3xl font-bold">{{ $marketStats['totalMarketCap'] }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header pb-2">
                <div class="card-title text-lg">Average Dividend Yield</div>
            </div>
            <div class="card-content">
                <p class="text-3xl font-bold">{{ $marketStats['averageDividendYield'] }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2">
            <div class="card">
                <div class="card-header">
                    <div class="flex justify-between items-center">
                        <div class="card-title">Sector Performance</div>
                        <select wire:model="period" class="w-[120px] rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">
                            <option value="">Select period</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>
                </div>
                <div class="card-content">
                    <div class="h-[350px]" wire:ignore>
                        <div id="sectorPerformanceChart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="card h-full">
                <div class="card-header">
                    <div class="card-title">Market Cap Distribution</div>
                </div>
                <div class="card-content">
                    <div class="h-[250px]" wire:ignore>
                        <div id="marketCapDistributionChart"></div>
                    </div>
                    <div class="mt-4">
                        <ul class="space-y-2">
                            @foreach ($marketCapDistribution as $index => $item)
                                <li class="flex items-center">
                                    <span
                                        class="w-3 h-3 rounded-full mr-2"
                                        style="background-color: {{ $PIE_COLORS[$index % count($PIE_COLORS)] }}"
                                    ></span>
                                    <span>{{ $item['name'] }}: {{ $item['value'] }}%</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">ZSE Top 10 Listed Companies</div>
        </div>
        <div class="card-content">
            <div class="table-responsive">
                <table class="table table-auto w-full">
                    <thead class="[&_th]:px-4 [&_th]:py-2 [&:last-child_th]:text-right">
                        <tr>
                            <th>Rank</th>
                            <th>Symbol</th>
                            <th>Company</th>
                            <th>Sector</th>
                            <th>Market Cap</th>
                            <th>Price</th>
                            <th>YTD Change</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topStocks as $stock)
                            <tr>
                                <td class="px-4 py-2">{{ $stock['rank'] }}</td>
                                <td class="font-medium px-4 py-2">{{ $stock['symbol'] }}</td>
                                <td class="px-4 py-2">{{ $stock['name'] }}</td>
                                <td class="px-4 py-2">{{ $stock['sector'] }}</td>
                                <td class="px-4 py-2">{{ $stock['marketCap'] }}</td>
                                <td class="px-4 py-2">{{ $stock['price'] }}</td>
                                <td class="{{ Str::startsWith($stock['changeYTD'], '+') ? 'text-green-600' : 'text-red-600' }} px-4 py-2">
                                    {{ $stock['changeYTD'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">ZSE All Share Index - Historical Performance</div>
        </div>
        <div class="card-content">
            <div class="h-[300px]" wire:ignore>
                <div id="historicalPerformanceChart"></div>
            </div>
        </div>
    </div>
</div>

@php
$period = $period ?? "2025";

$sectorPerformanceData = [
    [ 'name' => "Banking", 'value' => 15.4 ],
    [ 'name' => "Insurance", 'value' => 8.2 ],
    [ 'name' => "Retail", 'value' => 12.7 ],
    [ 'name' => "Manufacturing", 'value' => -4.3 ],
    [ 'name' => "Mining", 'value' => 18.9 ],
    [ 'name' => "Agriculture", 'value' => 5.6 ],
    [ 'name' => "Property", 'value' => -2.1 ],
    [ 'name' => "Telecom", 'value' => 9.8 ],
];

$marketCapDistribution = [
    [ 'name' => "Large Cap", 'value' => 45 ],
    [ 'name' => "Mid Cap", 'value' => 30 ],
    [ 'name' => "Small Cap", 'value' => 25 ],
];

$COLORS = ['#0088FE', '#00C49F', '#FFBB28', '#FF8042', '#8884d8', '#82ca9d', '#ffc658', '#8dd1e1'];
$PIE_COLORS = ['#3182ce', '#38a169', '#e53e3e'];

$topStocks = [
    [ 'rank' => 1, 'symbol' => "DLTA", 'name' => "Delta Corporation", 'sector' => "Beverages", 'marketCap' => "$38.5B", 'volume' => "2.3M", 'price' => "$312.50", 'changeYTD' => "+15.7%" ],
    [ 'rank' => 2, 'symbol' => "ECOZ", 'name' => "Econet Wireless", 'sector' => "Telecommunications", 'marketCap' => "$45.7B", 'volume' => "3.1M", 'price' => "$178.25", 'changeYTD' => "+8.3%" ],
    [ 'rank' => 3, 'symbol' => "INNH", 'name' => "Innscor Africa", 'sector' => "Food & Retail", 'marketCap' => "$29.8B", 'volume' => "1.8M", 'price' => "$423.00", 'changeYTD' => "+21.2%" ],
    [ 'rank' => 4, 'symbol' => "SEED", 'name' => "SeedCo Limited", 'sector' => "Agriculture", 'marketCap' => "$12.4B", 'volume' => "1.2M", 'price' => "$89.75", 'changeYTD' => "+5.9%" ],
    [ 'rank' => 5, 'symbol' => "PPCZ", 'name' => "PPC Limited", 'sector' => "Construction", 'marketCap' => "$7.8B", 'volume' => "0.9M", 'price' => "$124.60", 'changeYTD' => "-3.2%" ],
    [ 'rank' => 6, 'symbol' => "ABCH", 'name' => "African Banking Corp", 'sector' => "Banking", 'marketCap' => "$18.3B", 'volume' => "1.5M", 'price' => "$132.40", 'changeYTD' => "+12.8%" ],
    [ 'rank' => 7, 'symbol' => "MEIK", 'name' => "Meikles Limited", 'sector' => "Retail", 'marketCap' => "$8.9B", 'volume' => "0.7M", 'price' => "$178.65", 'changeYTD' => "-1.7%" ],
    [ 'rank' => 8, 'symbol' => "AFDS", 'name' => "Afdis", 'sector' => "Beverages", 'marketCap' => "$5.1B", 'volume' => "0.5M", 'price' => "$245.30", 'changeYTD' => "+9.4%" ],
    [ 'rank' => 9, 'symbol' => "ZBFH", 'name' => "ZB Financial Holdings", 'sector' => "Banking", 'marketCap' => "$6.7B", 'volume' => "0.6M", 'price' => "$98.20", 'changeYTD' => "+4.8%" ],
    [ 'rank' => 10, 'symbol' => "AXIA", 'name' => "Axia Corporation", 'sector' => "Retail", 'marketCap' => "$4.9B", 'volume' => "0.4M", 'price' => "$76.35", 'changeYTD' => "+7.2%" ],
];

$historicalData = [
    [ 'year' => "2020", 'value' => 18745.32 ],
    [ 'year' => "2021", 'value' => 21543.87 ],
    [ 'year' => "2022", 'value' => 23987.65 ],
    [ 'year' => "2023", 'value' => 26782.43 ],
    [ 'year' => "2024", 'value' => 29876.54 ],
    [ 'year' => "2025", 'value' => 32456.78 ],
];

$marketStats = [
    'totalListedCompanies' => 58,
    'totalMarketCap' => "$287.5B",
    'averagePE' => 13.8,
    'averageDividendYield' => "3.2%",
    'tradingVolume' => "35.7M shares",
    'tradingValue' => "$457.3M",
];
@endphp

<script>
    document.addEventListener('livewire:load', function () {
        const sectorPerformanceData = @json($sectorPerformanceData);
        const marketCapDistributionData = @json($marketCapDistribution);
        const historicalData = @json($historicalData);
        const colors = @json($COLORS);
        const pieColors = @json($PIE_COLORS);

        // Sector Performance Chart
        const sectorPerformanceChart = echarts.init(document.getElementById('sectorPerformanceChart'));
        const sectorPerformanceOptions = {
            xAxis: {
                type: 'category',
                data: sectorPerformanceData.map(item => item.name)
            },
            yAxis: {
                type: 'value',
                axisLabel: {
                    formatter: '{value} %'
                }
            },
            series: [{
                data: sectorPerformanceData.map((item, index) => ({
                    value: item.value,
                    itemStyle: {
                        color: item.value >= 0 ? colors[index % colors.length] : '#ef4444'
                    }
                })),
                type: 'bar',
                tooltip: {
                    valueFormatter: function (value) {
                        return value + ' %';
                    }
                }
            }],
            tooltip: {
                trigger: 'axis'
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            }
        };
        sectorPerformanceChart.setOption(sectorPerformanceOptions);

        // Market Cap Distribution Chart
        const marketCapDistributionChart = echarts.init(document.getElementById('marketCapDistributionChart'));
        const marketCapDistributionOptions = {
            series: [
                {
                    name: 'Market Cap Distribution',
                    type: 'pie',
                    radius: '80%',
                    data: marketCapDistributionData.map((item, index) => ({
                        value: item.value,
                        name: item.name,
                        itemStyle: {
                            color: pieColors[index % pieColors.length]
                        }
                    })),
                    label: {
                        formatter: '{b}: {d}%'
                    },
                    tooltip: {
                        valueFormatter: function (value) {
                            return value + ' %';
                        }
                    }
                }
            ],
            tooltip: {
                trigger: 'item'
            }
        };
        marketCapDistributionChart.setOption(marketCapDistributionOptions);

        // Historical Performance Chart
        const historicalPerformanceChart = echarts.init(document.getElementById('historicalPerformanceChart'));
        const historicalPerformanceOptions = {
            xAxis: {
                type: 'category',
                data: historicalData.map(item => item.year)
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                data: historicalData.map(item => item.value),
                type: 'bar',
                itemStyle: {
                    color: '#3182ce'
                }
            }],
            tooltip: {
                trigger: 'axis'
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            }
        };
        historicalPerformanceChart.setOption(historicalPerformanceOptions);

        window.addEventListener('resize', () => {
            sectorPerformanceChart.resize();
            marketCapDistributionChart.resize();
            historicalPerformanceChart.resize();
        });
    });
</script>