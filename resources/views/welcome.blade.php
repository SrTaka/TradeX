<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TradeX</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body { font-family: 'Nunito', sans-serif; background: #eaf1fb; }
            .hero-title { font-size: 3.5rem; font-weight: 900; letter-spacing: -2px; }
            .hero-highlight { color: #2563eb; }
            .btn-blue { background: #2563eb; color: #fff; border-radius: 0.5rem; padding: 0.75rem 2.5rem; font-weight: 700; font-size: 1.25rem; transition: background 0.2s; }
            .btn-blue:hover { background: #1d4ed8; }
            .btn-outline { background: #fff; color: #111; border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 0.75rem 2.5rem; font-weight: 700; font-size: 1.25rem; transition: background 0.2s; }
            .btn-outline:hover { background: #f3f4f6; }
            .nav-link { font-weight: 600; color: #bfcbe2; margin: 0 1.5rem; transition: color 0.2s; }
            .nav-link:hover { color: #2563eb; }
            .nav-link.active { color: #2563eb; }
            .dashboard-card { background: #fff; border-radius: 1.5rem; box-shadow: 0 4px 32px 0 #bfcbe2; padding: 2.5rem 2rem 2rem 2rem; margin-top: 3rem; max-width: 900px; margin-left: auto; margin-right: auto; }
            .dashboard-header { display: flex; align-items: center; font-weight: 700; font-size: 1.1rem; margin-bottom: 1.5rem; }
            .dot { height: 0.75rem; width: 0.75rem; border-radius: 9999px; display: inline-block; margin-right: 0.3rem; }
            .dot-red { background: #f87171; }
            .dot-yellow { background: #fbbf24; }
            .dot-green { background: #34d399; }
            .dashboard-content { display: flex; gap: 2rem; }
            .dashboard-panel { background: #23293a; border-radius: 1rem; flex: 1; padding: 2rem 1.5rem; color: #fff; min-width: 0; }
            .dashboard-panel .label { color: #bfcbe2; font-size: 1rem; margin-bottom: 0.5rem; }
            .dashboard-panel .value { font-size: 2.2rem; font-weight: 800; }
            .dashboard-panel .change { color: #34d399; font-weight: 700; margin-top: 0.5rem; }
            .market-row { display: flex; justify-content: space-between; margin-bottom: 0.3rem; font-size: 1.1rem; }
            .market-row .red { color: #f87171; }
            .market-row .green { color: #34d399; }
            @media (max-width: 900px) {
                .dashboard-content { flex-direction: column; gap: 1.5rem; }
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-gray-100">
            <!-- Navigation -->
            <nav class="flex justify-between items-center max-w-7xl mx-auto py-6 px-4">
                <div class="text-2xl font-extrabold" style="color:#2563eb;">TradeX</div>
                <div class="flex gap-8 items-center">
                    <a href="#features" class="nav-link">Features</a>
                    <a href="#pricing" class="nav-link">Pricing</a>
                    <a href="#about" class="nav-link">About</a>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('login') }}" class="btn-outline" style="font-size:1rem;padding:0.5rem 1.5rem;">Log in</a>
                    <a href="{{ route('register') }}" class="btn-blue" style="font-size:1rem;padding:0.5rem 1.5rem;">Sign up</a>
                </div>
            </nav>

            <!-- Hero Section -->
            <div class="relative bg-white overflow-hidden">
                <div class="max-w-7xl mx-auto">
                    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                            <div class="sm:text-center lg:text-left">
                                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                    <span class="block">Advanced Trading</span>
                                    <span class="block text-indigo-600">Made Simple</span>
                                </h1>
                                <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                    Track your favorite stocks, analyze market trends, and make informed trading decisions with our powerful platform.
                                </p>
                            </div>
                        </main>
                    </div>
                </div>
            </div>

            <section id="features" class="py-20" style="background: #f6f8fb;">
                <h2 class="text-4xl font-extrabold text-center mb-4">Powerful Trading Features</h2>
                <p class="text-center text-xl text-gray-500 mb-12">Everything you need to analyze markets and make informed decisions</p>
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="feature-card">
                        <h3 class="text-2xl font-bold mb-2">Real-time Data</h3>
                        <p>Stay updated with real-time market data from global exchanges. Make timely decisions with second-by-second updates.</p>
                    </div>
                    <div class="feature-card">
                        <h3 class="text-2xl font-bold mb-2">Historical Analysis</h3>
                        <p>Access years of historical data to analyze patterns, trends, and seasonal behaviors to inform your trading strategy.</p>
                    </div>
                    <div class="feature-card">
                        <h3 class="text-2xl font-bold mb-2">Daily Summaries</h3>
                        <p>Get comprehensive end-of-day market summaries with key insights into the day's trading activity.</p>
                    </div>
                    <div class="feature-card">
                        <h3 class="text-2xl font-bold mb-2">Advanced Charting</h3>
                        <p>Visualize market data with powerful charting tools featuring multiple timeframes and technical indicators.</p>
                    </div>
                    <div class="feature-card">
                        <h3 class="text-2xl font-bold mb-2">Custom Watchlists</h3>
                        <p>Create and monitor personalized watchlists to keep track of your favorite markets and securities.</p>
                    </div>
                    <div class="feature-card">
                        <h3 class="text-2xl font-bold mb-2">Mobile Access</h3>
                        <p>Access your trading dashboard from anywhere with our responsive mobile experience.</p>
                    </div>
                </div>
            </section>
            <section id="pricing" class="py-20 bg-blue-50">
                <h2 class="text-4xl font-extrabold text-center mb-4">Simple, Transparent Pricing</h2>
                <p class="text-center text-xl text-gray-500 mb-12">Choose the plan that's right for your trading needs</p>
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="pricing-card">
                        <h3 class="text-2xl font-bold mb-2">Basic</h3>
                        <p class="text-gray-500 mb-4">For casual investors</p>
                        <div class="text-4xl font-extrabold mb-2">$0<span class="text-lg font-normal">/month</span></div>
                        <ul class="mb-6 text-gray-700">
                            <li>✔ Delayed market data</li>
                            <li>✔ Basic charts</li>
                            <li>✔ 1 watchlist</li>
                        </ul>
                        <a href="{{ route('free-trial') }}" class="btn-outline w-full block text-center">Sign Up Free</a>
                    </div>
                    <div class="pricing-card active" style="border-color:#2563eb;">
                        <h3 class="text-2xl font-bold mb-2">Pro</h3>
                        <p class="text-gray-500 mb-4">For active traders</p>
                        <div class="text-4xl font-extrabold mb-2">$29<span class="text-lg font-normal">/month</span></div>
                        <ul class="mb-6 text-gray-700">
                            <li>✔ Real-time market data</li>
                            <li>✔ Advanced charts & indicators</li>
                            <li>✔ 10 watchlists</li>
                            <li>✔ Historical data (5 years)</li>
                        </ul>
                        <a href="{{ route('register') }}" class="btn-blue w-full block text-center">Start Pro Trial</a>
                    </div>
                    <div class="pricing-card">
                        <h3 class="text-2xl font-bold mb-2">Enterprise</h3>
                        <p class="text-gray-500 mb-4">For institutions</p>
                        <div class="text-4xl font-extrabold mb-2">$99<span class="text-lg font-normal">/month</span></div>
                        <ul class="mb-6 text-gray-700">
                            <li>✔ Premium real-time data</li>
                            <li>✔ All technical indicators</li>
                            <li>✔ Unlimited watchlists</li>
                            <li>✔ Historical data (20+ years)</li>
                            <li>✔ API access</li>
                        </ul>
                        <a href="#contact" class="btn-outline w-full block text-center">Contact Sales</a>
                    </div>
                </div>
            </section>
            <section id="about" class="py-20" style="background: #f6f8fb;">
                <h2 class="text-4xl font-extrabold text-center mb-2">About TradeX</h2>
                <p class="text-center text-2xl text-gray-400 mb-12">Designed by traders, for traders</p>
                <div class="max-w-3xl mx-auto text-lg text-gray-900 mb-20" style="line-height:2;">
                    TradeX was founded by a team of financial analysts, data scientists, and traders who recognized the need for a more accessible and powerful trading data platform.<br>
                    Our mission is to provide traders and investors of all levels with the tools and data they need to make informed decisions in the market, without the complexity and high costs typically associated with professional trading platforms.<br>
                    With TradeX, you get reliable, real-time market data combined with intuitive visualization tools and comprehensive historical analysis capabilities, all accessible through a clean, modern interface.<br>
                    Whether you're a day trader, swing trader, or long-term investor, TradeX provides the insights you need when you need them.
                </div>
            </section>
            <section class="py-20 bg-white">
                <div class="text-center">
                    <h2 class="text-4xl font-extrabold mb-4">Ready to Elevate Your Trading?</h2>
                    <p class="text-xl text-gray-500 mb-8">Join thousands of traders who trust TradeX for market insights.</p>
                    <a href="{{ route('register') }}" class="btn-blue text-xl">Create Your Account</a>
                </div>
            </section>
        </div>
    </body>
</html>
