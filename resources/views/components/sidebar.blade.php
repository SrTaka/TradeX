@props(['active'])

<aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 pt-16 z-20 transform transition-transform duration-200 ease-in-out shadow-xl rounded-r-2xl">
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
                <a href="{{ route('live-data') }}" class="flex items-center p-3 text-gray-900 rounded-xl hover:bg-blue-50 transition {{ request()->routeIs('live-data') ? 'bg-blue-100 text-blue-700 font-bold shadow' : '' }}">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span class="ml-3">Live Data</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('summary-data') }}" class="flex items-center p-3 text-gray-900 rounded-xl hover:bg-blue-50 transition {{ request()->routeIs('summary-data') ? 'bg-blue-100 text-blue-700 font-bold shadow' : '' }}">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                    </svg>
                    <span class="ml-3">Summary Data</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('news-updates') }}" class="flex items-center p-3 text-gray-900 rounded-xl hover:bg-blue-50 transition {{ request()->routeIs('news-updates') ? 'bg-blue-100 text-blue-700 font-bold shadow' : '' }}">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1h2a2 2 0 012 2v9a2 2 0 01-2 2zM7 10h4v4H7v-4zm8 0h2v2h-2v-2zm-6 4h4v2H9v-2z"></path>
                    </svg>
                    <span class="ml-3">News Updates</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('recommendations') }}" class="flex items-center p-3 text-gray-900 rounded-xl hover:bg-blue-50 transition {{ request()->routeIs('recommendations') ? 'bg-blue-100 text-blue-700 font-bold shadow' : '' }}">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <span class="ml-3">Recommendations</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('portfolio') }}" class="flex items-center p-3 text-gray-900 rounded-xl hover:bg-blue-50 transition {{ request()->routeIs('portfolio') ? 'bg-blue-100 text-blue-700 font-bold shadow' : '' }}">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    <span class="ml-3">Portfolio Tracking</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('one-on-one') }}" class="flex items-center p-3 text-gray-900 rounded-xl hover:bg-blue-50 transition {{ request()->routeIs('one-on-one') ? 'bg-blue-100 text-blue-700 font-bold shadow' : '' }}">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    <span class="ml-3">One on One</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('premium') }}" class="flex items-center p-3 text-gray-900 rounded-xl hover:bg-blue-50 transition {{ request()->routeIs('premium') ? 'bg-blue-100 text-blue-700 font-bold shadow' : '' }}">
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
<div id="sidebar-backdrop" class="fixed inset-0 bg-black bg-opacity-50 z-10 hidden md:hidden"></div>