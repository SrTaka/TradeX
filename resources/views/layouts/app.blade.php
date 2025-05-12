<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TradeX') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- TradingView Widget -->
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>

        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="font-sans antialiased" style="font-family: 'Nunito', sans-serif; background: #eaf1fb;">
        <div class="min-h-screen" style="background: #eaf1fb;">
            @include('layouts.navigation')
            
            <!-- Sidebar -->
            <x-sidebar />

            <div class="pt-16 pl-0 md:pl-64 min-h-screen transition-all duration-200">
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('scripts')

         <style>
            /* Modal Base Styles */
            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0,0,0,0.5);
                justify-content: center;
                align-items: center;
            }

            .modal-content {
                background-color: white;
                border-radius: 8px;
                width: 90%;
                max-width: 600px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                position: relative;
                max-height: 90vh;
                overflow-y: auto;
            }

            .modal-header {
                padding: 20px;
                border-bottom: 1px solid #e0e0e0;
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: sticky;
                top: 0;
                background: white;
                z-index: 1;
            }

            .modal-body {
                padding: 20px;
                overflow-y: auto;
            }

            .modal-footer {
                padding: 20px;
                border-top: 1px solid #e0e0e0;
                display: flex;
                justify-content: flex-end;
                position: sticky;
                bottom: 0;
                background: white;
                z-index: 1;
            }

            .close-btn {
                background: none;
                border: none;
                font-size: 24px;
                cursor: pointer;
                color: #888;
                padding: 4px 8px;
                border-radius: 4px;
                transition: background-color 0.2s;
            }

            .close-btn:hover {
                background-color: #f3f4f6;
            }

            /* Specific styles for Live Data modal */
            #liveDataModal .modal-content {
                max-width: 90%;
                width: 1200px;
            }

            #liveDataModal .modal-body {
                padding: 0;
            }

            #liveDataModal .bg-white {
                border-radius: 8px;
            }
        </style>

        <script>
            // Function to open a specific modal
            function openModal(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    // If it's the news updates modal, load content
                    if (modalId === 'newsUpdatesModal' && typeof showNewsUpdates === 'function') {
                        showNewsUpdates();
                    }
                    modal.style.display = 'flex';
                    document.body.style.overflow = 'hidden'; // Prevent background scrolling
                    // If it's the live data modal, load content via AJAX
                    if (modalId === 'liveDataModal') {
                        const body = document.getElementById('liveDataModalBody');
                        body.innerHTML = '<div class="flex justify-center items-center py-10 text-gray-500">Loading...</div>';
                        fetch('/live-data-content')
                            .then(response => response.text())
                            .then(html => {
                                body.innerHTML = html;
                                if (modalId === 'liveDataModal' && typeof loadTradingViewWidget === 'function') {
                                    loadTradingViewWidget();
                                }
                            })
                            .catch(() => {
                                body.innerHTML = '<div class="text-red-500 p-4">Failed to load data.</div>';
                            });
                    }
                } else {
                    console.error(`Modal with ID ${modalId} not found`);
                }
            }

            // Function to close a specific modal
            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'none';
                    document.body.style.overflow = ''; // Restore scrolling
                }
            }

            // Close modal when clicking outside of it
            window.addEventListener('click', function(event) {
                const modals = document.getElementsByClassName('modal');
                for (let modal of modals) {
                    if (event.target === modal) {
                        closeModal(modal.id);
                    }
                }
            });

            // Initialize modal functionality when DOM is loaded
            document.addEventListener('DOMContentLoaded', function() {
                const modalLinks = document.querySelectorAll('a[data-modal]');
                
                modalLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const modalId = this.getAttribute('data-modal') + 'Modal';
                        openModal(modalId);
                    });
                });

                // Add keyboard support for closing modals
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        const openModals = document.querySelectorAll('.modal[style*="display: flex"]');
                        openModals.forEach(modal => {
                            closeModal(modal.id);
                        });
                    }
                });
            });
        </script>

        @include('modals')
    </body>
</html>