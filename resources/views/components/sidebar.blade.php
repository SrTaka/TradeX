@props(['active'])

<aside x-show="sidebarOpen" @keydown.window.escape="sidebarOpen = false" class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 pt-16 z-20 transform transition-transform duration-200 ease-in-out translate-x-0 md:translate-x-0 md:block shadow-xl rounded-r-2xl" :class="{'-translate-x-full': !sidebarOpen, 'block': sidebarOpen, 'md:block': true}" x-cloak>
    <div class="h-full px-5 py-6 overflow-y-auto">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-3 text-gray-900 rounded-xl hover:bg-blue-50 transition {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700 font-bold shadow' : '' }}">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" @click.prevent="$store.modals.liveData = true" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span class="ml-3">Live Data</span>
                </a>
            </li>
            <li>
                <a href="#" @click.prevent="$store.modals.summaryData = true" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="ml-3">Summary Data</span>
                </a>
            </li>
            <li>
                <a href="#" @click.prevent="$store.modals.newsUpdates = true" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span class="ml-3">News Updates</span>
                </a>
            </li>
            <li>
                <a href="#" @click.prevent="$store.modals.recommendations = true" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span class="ml-3">Recommendations</span>
                </a>
            </li>
            <li>
                <a href="#" @click.prevent="$store.modals.portfolioTracking = true" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span class="ml-3">Portfolio Tracking</span>
                </a>
            </li>
            <li>
                <a href="#" @click.prevent="$store.modals.oneOnOneWithAgent = true" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                    <span class="ml-3">One on One with Agent</span>
                </a>
            </li>
            <li>
                <a href="#" @click.prevent="$store.modals.premiumPackage = true" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="ml-3">Premium Package</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- Mobile backdrop -->
<div x-show="sidebarOpen" class="fixed inset-0 bg-black bg-opacity-50 z-10 md:hidden" @click="sidebarOpen = false" x-cloak></div>
