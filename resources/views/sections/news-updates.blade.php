<x-app-layout>
    <div class="pt-20 pb-6 md:pl-64">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-8">
                <!-- Header Section -->
                <div class="bg-white rounded-2xl shadow p-6 flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">News & Updates</h2>
                        <p class="text-gray-500 mt-1">Stay informed with the latest market news and updates</p>
                    </div>
                </div>

                <!-- News Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- News Card 1 -->
                    <div class="bg-white rounded-2xl shadow p-6 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="px-3 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded-full">Market News</span>
                                <span class="text-xs text-gray-400">2 hours ago</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Market Analysis: Q1 2024 Outlook</h3>
                            <p class="text-gray-500 mb-4">Detailed analysis of market trends and predictions for the first quarter of 2024...</p>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Read More →</a>
                    </div>

                    <!-- News Card 2 -->
                    <div class="bg-white rounded-2xl shadow p-6 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="px-3 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded-full">Trading Tips</span>
                                <span class="text-xs text-gray-400">5 hours ago</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">Essential Trading Strategies for Beginners</h3>
                            <p class="text-gray-500 mb-4">Learn the fundamental strategies that every new trader should know...</p>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Read More →</a>
                    </div>

                    <!-- News Card 3 -->
                    <div class="bg-white rounded-2xl shadow p-6 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="px-3 py-1 text-xs font-semibold text-purple-600 bg-purple-100 rounded-full">Platform Update</span>
                                <span class="text-xs text-gray-400">1 day ago</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">New Features Released</h3>
                            <p class="text-gray-500 mb-4">Discover the latest features and improvements to our trading platform...</p>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Read More →</a>
                    </div>
                </div>

                <!-- Newsletter Subscription -->
                <div class="bg-white rounded-2xl shadow p-6">
                    <div class="max-w-2xl mx-auto text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Stay Updated</h3>
                        <p class="text-gray-500 mb-4">Subscribe to our newsletter for daily market insights and trading tips</p>
                        <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                            <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 