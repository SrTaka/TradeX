<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Free Trial Dashboard - Trade Advisory Limited</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="max-w-md mx-auto p-4 space-y-6">

        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow p-4">
            <h1 class="text-xl font-bold text-blue-600">Welcome to Trade Advisory Limited</h1>
            <p class="mt-1 text-sm text-gray-600">
                Start your free trial with insights from the Zimbabwe Stock Exchange (ZSE).
            </p>
        </div>

        <!-- Market Summary -->
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-2">📊 ZSE Market Summary</h2>
            <p><strong>ZSE All Share Index:</strong> 123,456.78 (+2.34% today)</p>
            <p><strong>YTD Performance:</strong> +18.5%</p>

            <div class="mt-3">
                <h3 class="font-semibold">Top Performing Sectors</h3>
                <ul class="list-disc ml-5 text-sm text-green-700">
                    <li>Consumer Staples: +5.2%</li>
                    <li>Financials: +3.9%</li>
                    <li>Industrials: +2.7%</li>
                </ul>

                <h3 class="font-semibold mt-3">Top Losing Sectors</h3>
                <ul class="list-disc ml-5 text-sm text-red-700">
                    <li>Real Estate: -1.8%</li>
                    <li>Energy: -0.9%</li>
                </ul>
            </div>
        </div>

        <!-- Top Companies Table -->
        <div class="bg-white rounded-lg shadow p-4 overflow-x-auto">
            <h2 class="text-lg font-semibold mb-2">🏆 Top 5 Companies to Watch</h2>
            <table class="text-sm w-full">
                <thead class="text-left text-gray-600 border-b">
                    <tr>
                        <th>Company</th>
                        <th>Ticker</th>
                        <th>Price</th>
                        <th>7d %</th>
                        <th>Cap</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td>Delta Corp</td>
                        <td>DLTA.ZW</td>
                        <td>4,500</td>
                        <td class="text-green-600">+6.1%</td>
                        <td>ZWL 550B</td>
                    </tr>
                    <tr class="border-b">
                        <td>Econet Wireless</td>
                        <td>ECO.ZW</td>
                        <td>3,200</td>
                        <td class="text-green-600">+5.5%</td>
                        <td>ZWL 480B</td>
                    </tr>
                    <tr class="border-b">
                        <td>CBZ Holdings</td>
                        <td>CBZ.ZW</td>
                        <td>2,950</td>
                        <td class="text-green-600">+4.2%</td>
                        <td>ZWL 420B</td>
                    </tr>
                    <tr class="border-b">
                        <td>OK Zimbabwe</td>
                        <td>OKZ.ZW</td>
                        <td>1,250</td>
                        <td class="text-green-600">+3.8%</td>
                        <td>ZWL 190B</td>
                    </tr>
                    <tr class="border-b">
                        <td>Innscor Africa</td>
                        <td>INN.ZW</td>
                        <td>5,100</td>
                        <td class="text-green-600">+3.5%</td>
                        <td>ZWL 600B</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Chart Placeholder -->
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-2">📈 ZSE Index - Last 5 Months</h2>
            <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-500 text-sm rounded">
                Chart Placeholder
            </div>
        </div>

        <!-- Investment Tips -->
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-2">💡 Investment Tips</h2>
            <ul class="list-disc ml-5 text-sm">
                <li>Diversify across top-performing sectors.</li>
                <li>Target companies with strong financials and dividend history.</li>
                <li>Be cautious with high-volatility stocks.</li>
            </ul>
            <blockquote class="mt-3 italic text-sm text-gray-600">
                "Delta Corporation remains a strong pick due to its market dominance and consistent dividend history."
            </blockquote>
        </div>

        <!-- Call to Action -->
        <div class="bg-blue-600 text-white rounded-lg shadow p-4 text-center">
            <h2 class="text-lg font-bold">🔓 Unlock Full Access</h2>
            <p class="text-sm mt-1">Get daily stock picks, real-time insights, and more!</p>
            <a href="/subscribe" class="mt-3 inline-block bg-white text-blue-600 font-semibold px-4 py-2 rounded">
                Subscribe Now
            </a>
        </div>

    </div>

</body>
</html>