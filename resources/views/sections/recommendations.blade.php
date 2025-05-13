<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                $riskTolerance = $riskTolerance ?? 'moderate';
                $recommendedPortfolio = $recommendedPortfolio ?? [];
                $activeTab = $activeTab ?? 'growth';
                $growthStocks = $growthStocks ?? [];
                $incomeStocks = $incomeStocks ?? [];
                $valueStocks = $valueStocks ?? [];
                $chartData = $chartData ?? [];
            @endphp
            <div class="space-y-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-zimstock-blue">Investment Recommendations</h2>
                        <p class="text-muted-foreground">Personalized stock picks and investment strategies</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <select wire:model="riskTolerance" class="w-[180px] rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">
                                <option value="moderate">Risk tolerance</option>
                                <option value="conservative">Conservative</option>
                                <option value="moderate">Moderate</option>
                                <option value="aggressive">Aggressive</option>
                            </select>
                        </div>
                        <button class="inline-flex items-center justify-center rounded-md bg-zimstock-green px-4 py-2 text-sm font-medium text-white hover:bg-zimstock-green/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50">
                            Update Profile
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6 bg-gradient-to-r from-zimstock-blue to-zimstock-lightblue text-white">
                    <div class="card-header pb-2">
                        <h3 class="card-title text-xl">Your Personalized Investment Strategy</h3>
                        <p class="card-description text-white/80">
                            Based on your {{ $riskTolerance }} risk tolerance and investment goals
                        </p>
                    </div>
                    <div class="card-content pt-6">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            @foreach ($recommendedPortfolio as $item)
                                <div class="bg-white border-none shadow-sm rounded-lg p-4">
                                    <div class="card-header pb-2">
                                        <h4 class="card-title text-lg text-zimstock-blue">{{ $item['category'] }}</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="text-3xl font-bold text-zimstock-blue mb-2">{{ $item['allocation'] }}</div>
                                        <p class="text-sm text-muted-foreground">{{ $item['description'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium mb-4">Performance Projection - {{ ucfirst($riskTolerance) }} Growth Strategy</h3>
                            <div class="h-[250px]">
                                <livewire:stocks.stock-chart :data="$chartData" color="#276749" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-gray-50 border-t mt-6 p-4 rounded-b-lg">
                        <p class="text-sm text-muted-foreground">
                            <span class="font-medium">Note:</span> This projection is based on historical data and market analysis.
                            Actual results may vary depending on market conditions. Past performance is not indicative of future results.
                        </p>
                    </div>
                </div>

                <div class="tabs" wire:ignore>
                    <div class="tabs-list mb-4 w-full md:w-auto flex gap-2">
                        <button wire:click="$set('activeTab', 'growth')" class="inline-flex items-center gap-2 justify-center whitespace-nowrap rounded-sm px-3 py-2 text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 {{ $activeTab === 'growth' ? 'bg-blue-100 text-blue-700 font-bold shadow' : 'bg-white text-gray-700' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 00-1.41-1.41l-2.34 2.34 3.75 3.75a1 1 0 001.41-1.41l2.34-2.34z" />
                            </svg>
                            <span>Growth</span>
                        </button>
                        <button wire:click="$set('activeTab', 'income')" class="inline-flex items-center gap-2 justify-center whitespace-nowrap rounded-sm px-3 py-2 text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 {{ $activeTab === 'income' ? 'bg-blue-100 text-blue-700 font-bold shadow' : 'bg-white text-gray-700' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.5a1 1 0 01-1 1H4a1 1 0 01-1-1V3a1 1 0 011-1h6zm7 0a1 1 0 011 1v1.5a1 1 0 01-1 1h-6a1 1 0 01-1-1V3a1 1 0 011-1h6zm-3 6a1 1 0 011 1v1.5a1 1 0 01-1 1H4a1 1 0 01-1-1V7a1 1 0 011-1h9zm7 0a1 1 0 011 1v1.5a1 1 0 01-1 1h-6a1 1 0 01-1-1V7a1 1 0 011-1h6zm-3 6a1 1 0 011 1v1.5a1 1 0 01-1 1H4a1 1 0 01-1-1v-1.5a1 1 0 011-1h9zm7 0a1 1 0 011 1v1.5a1 1 0 01-1 1h-6a1 1 0 01-1-1v-1.5a1 1 0 011-1h6z" clip-rule="evenodd" />
                            </svg>
                            <span>Income</span>
                        </button>
                        <button wire:click="$set('activeTab', 'value')" class="inline-flex items-center gap-2 justify-center whitespace-nowrap rounded-sm px-3 py-2 text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 {{ $activeTab === 'value' ? 'bg-blue-100 text-blue-700 font-bold shadow' : 'bg-white text-gray-700' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                                <path fill-rule="evenodd" d="M12 1.5a.75.75 0 01.75.75V5h2.5a.75.75 0 010 1.5H12.75v2.75a.75.75 0 01-1.5 0V6.5H8.5a.75.75 0 010-1.5h2.5V2.25A.75.75 0 0112 1.5zM6.75 6.75a.75.75 0 011.06 0l3 3a.75.75 0 01-1.06 1.06l-3-3a.75.75 0 010-1.06zM16.19 6.75a.75.75 0 010 1.06l-3 3a.75.75 0 01-1.06-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
                                <path d="M6 10.5a3 3 0 116 0v3a3 3 0 11-6 0v-3zm12-3a3 3 0 116 0v6a3 3 0 11-6 0V7.5z" />
                            </svg>
                            <span>Value</span>
                        </button>
                    </div>

                    <div class="tabs-content mt-6">
                        @if ($activeTab === 'growth')
                            <div class="bg-white rounded-lg shadow p-6">
                                <div class="card-header">
                                    <h3 class="card-title flex items-center gap-2 text-zimstock-blue">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-zimstock-blue">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 00-1.41-1.41l-2.34 2.34 3.75 3.75a1 1 0 001.41-1.41l2.34-2.34z" />
                                        </svg>
                                        Growth Stock Recommendations
                                    </h3>
                                    <p class="card-description">
                                        Stocks with strong growth potential for long-term capital appreciation
                                    </p>
                                </div>
                                <div class="card-content">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                        @foreach ($growthStocks as $stock)
                                            <livewire:stocks.stock-card :stock="$stock" :key="'growth-' . $loop->index" />
                                        @endforeach
                                    </div>
                                    <div class="mt-8">
                                        <h4 class="font-medium mb-4">Why We Recommend These Stocks</h4>
                                        <ul class="list-disc pl-5 space-y-2 text-muted-foreground">
                                            <li>Strong revenue growth trajectory over the past 3 years</li>
                                            <li>Expanding market share in their respective industries</li>
                                            <li>Solid management teams with clear growth strategies</li>
                                            <li>Operating in sectors with favorable economic outlook</li>
                                            <li>Investing in innovation and new product development</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($activeTab === 'income')
                            <div class="bg-white rounded-lg shadow p-6">
                                <div class="card-header">
                                    <h3 class="card-title flex items-center gap-2 text-zimstock-green">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-zimstock-green">
                                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.5a1 1 0 01-1 1H4a1 1 0 01-1-1V3a1 1 0 011-1h6zm7 0a1 1 0 011 1v1.5a1 1 0 01-1 1h-6a1 1 0 01-1-1V3a1 1 0 011-1h6zm-3 6a1 1 0 011 1v1.5a1 1 0 01-1 1H4a1 1 0 01-1-1V7a1 1 0 011-1h9zm7 0a1 1 0 011 1v1.5a1 1 0 01-1 1h-6a1 1 0 01-1-1V7a1 1 0 011-1h6zm-3 6a1 1 0 011 1v1.5a1 1 0 01-1 1H4a1 1 0 01-1-1v-1.5a1 1 0 011-1h9zm7 0a1 1 0 011 1v1.5a1 1 0 01-1 1h-6a1 1 0 01-1-1v-1.5a1 1 0 011-1h6z" clip-rule="evenodd" />
                                        </svg>
                                        Income Stock Recommendations
                                    </h3>
                                    <p class="card-description">
                                        Dividend-paying stocks for regular income generation
                                    </p>
                                </div>
                                <div class="card-content">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                        @foreach ($incomeStocks as $stock)
                                            <livewire:stocks.stock-card :stock="$stock" :key="'income-' . $loop->index" />
                                        @endforeach
                                    </div>
                                    <div class="mt-8">
                                        <h4 class="font-medium mb-4">Why We Recommend These Stocks</h4>
                                        <ul class="list-disc pl-5 space-y-2 text-muted-foreground">
                                            <li>Consistent dividend payments and yield</li>
                                            <li>Strong cash flow and financial stability</li>
                                            <li>Track record of returning value to shareholders</li>
                                            <li>Operating in mature, stable industries</li>
                                            <li>Potential for dividend growth over time</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($activeTab === 'value')
                            <div class="bg-white rounded-lg shadow p-6">
                                <div class="card-header">
                                    <h3 class="card-title flex items-center gap-2 text-zimstock-yellow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-zimstock-yellow">
                                            <path fill-rule="evenodd" d="M12 1.5a.75.75 0 01.75.75V5h2.5a.75.75 0 010 1.5H12.75v2.75a.75.75 0 01-1.5 0V6.5H8.5a.75.75 0 010-1.5h2.5V2.25A.75.75 0 0112 1.5zM6.75 6.75a.75.75 0 011.06 0l3 3a.75.75 0 01-1.06 1.06l-3-3a.75.75 0 010-1.06zM16.19 6.75a.75.75 0 010 1.06l-3 3a.75.75 0 01-1.06-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
                                            <path d="M6 10.5a3 3 0 116 0v3a3 3 0 11-6 0v-3zm12-3a3 3 0 116 0v6a3 3 0 11-6 0V7.5z" />
                                        </svg>
                                        Value Stock Recommendations
                                    </h3>
                                    <p class="card-description">
                                        Stocks trading below their intrinsic value with upside potential
                                    </p>
                                </div>
                                <div class="card-content">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                        @foreach ($valueStocks as $stock)
                                            <livewire:stocks.stock-card :stock="$stock" :key="'value-' . $loop->index" />
                                        @endforeach
                                    </div>
                                    <div class="mt-8">
                                        <h4 class="font-medium mb-4">Why We Recommend These Stocks</h4>
                                        <ul class="list-disc pl-5 space-y-2 text-muted-foreground">
                                            <li>Undervalued based on fundamental analysis</li>
                                            <li>Strong balance sheets and low debt</li>
                                            <li>Potential for price appreciation as market recognizes value</li>
                                            <li>Stable earnings and cash flow</li>
                                            <li>Attractive risk/reward profile</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>