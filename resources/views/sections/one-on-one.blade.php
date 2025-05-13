{{-- resources/views/one-on-one.blade.php --}}
<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">One-on-One Consultation</h2>
            
            <!-- Consultation Request Form -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="text-lg font-semibold mb-4">Request a Consultation</h3>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="name" name="name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>
                    <div>
                        <label for="topic" class="block text-sm font-medium text-gray-700 mb-1">Consultation Topic</label>
                        <select id="topic" name="topic" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select a topic</option>
                            <option value="portfolio_review">Portfolio Review</option>
                            <option value="investment_strategy">Investment Strategy</option>
                            <option value="market_analysis">Market Analysis</option>
                            <option value="risk_management">Risk Management</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Additional Details</label>
                        <textarea id="message" name="message" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
                    <div>
                        <label for="preferred_date" class="block text-sm font-medium text-gray-700 mb-1">Preferred Date</label>
                        <input type="date" id="preferred_date" name="preferred_date" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="preferred_time" class="block text-sm font-medium text-gray-700 mb-1">Preferred Time</label>
                        <select id="preferred_time" name="preferred_time" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select a time slot</option>
                            <option value="morning">Morning (9:00 AM - 12:00 PM)</option>
                            <option value="afternoon">Afternoon (1:00 PM - 4:00 PM)</option>
                            <option value="evening">Evening (4:00 PM - 6:00 PM)</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Submit Request
                        </button>
                    </div>
                </form>
            </div>

            <!-- Available Consultants -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold">Our Consultants</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-gray-200 rounded-full"></div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold">Tawananyasha Ziyambe</h4>
                                <p class="text-sm text-gray-500">Chief Technological Officer</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Specializes in portfolio management and market analysis with over 15 years of experience.</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Available: Mon-Fri, 9AM-5PM</span>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-gray-200 rounded-full"></div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold">Tanatswa Nguruza</h4>
                                <p class="text-sm text-gray-500">Customer Support Manager</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Expert in risk assessment and investment strategies with a focus on long-term growth.</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Available: Mon-Thu, 10AM-6PM</span>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-gray-200 rounded-full"></div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold">Anashe Masomeke</h4>
                                <p class="text-sm text-gray-500">Chief Marketing Officer</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Specializes in technical analysis and market trends with a strong focus on emerging markets.</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Available: Tue-Sat, 11AM-7PM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
