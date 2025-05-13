document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('sidebar-backdrop');
    const toggleBtn = document.getElementById('sidebar-toggle');

    function isDesktop() {
        return window.innerWidth >= 768;
    }

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
        if (backdrop) backdrop.classList.remove('hidden');
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('translate-x-0');
        if (backdrop) backdrop.classList.add('hidden');
    }

    function updateSidebarState() {
        if (isDesktop()) {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            if (backdrop) backdrop.classList.add('hidden');
        } else {
            closeSidebar();
        }
    }

    // Toggle button event
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            if (sidebar.classList.contains('-translate-x-full')) {
                openSidebar();
            } else {
                closeSidebar();
            }
        });
    }

    // Backdrop click event
    if (backdrop) {
        backdrop.addEventListener('click', function() {
            closeSidebar();
        });
    }

    // Window resize event
    window.addEventListener('resize', function() {
        updateSidebarState();
    });

    // ESC key closes sidebar on mobile
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !isDesktop()) {
            closeSidebar();
        }
    });

    // Initial state
    updateSidebarState();
});