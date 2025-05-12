document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('sidebar-backdrop');
    const toggleBtn = document.getElementById('sidebar-toggle');
    let isOpen = window.innerWidth >= 768;

    // Initialize
    updateSidebarState();

    // Toggle button event
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            isOpen = !isOpen;
            updateSidebarState();
            localStorage.setItem('sidebarOpen', isOpen);
        });
    }

    // Backdrop click event
    if (backdrop) {
        backdrop.addEventListener('click', function() {
            isOpen = false;
            updateSidebarState();
            localStorage.setItem('sidebarOpen', isOpen);
        });
    }

    // Window resize event
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            isOpen = true;
        } else {
            isOpen = localStorage.getItem('sidebarOpen') === 'true';
        }
        updateSidebarState();
    });

    function updateSidebarState() {
        if (isOpen) {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            if (backdrop) backdrop.classList.add('hidden');
        } else {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            if (backdrop) backdrop.classList.remove('hidden');
        }
    }
});