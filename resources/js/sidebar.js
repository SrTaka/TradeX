document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('sidebar-backdrop');
    const toggleBtn = document.getElementById('sidebar-toggle');
    
    // Track sidebar state with localStorage persistence
    let isOpen = localStorage.getItem('sidebarOpen') === 'true';
    
    // Initialize based on screen size
    if (window.innerWidth < 768) {
        isOpen = false; // Always start closed on mobile
    }

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
        isOpen = true;
        localStorage.setItem('sidebarOpen', 'true');
        
        if (window.innerWidth < 768) {
            backdrop.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }
    }
    
    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('translate-x-0');
        isOpen = false;
        localStorage.setItem('sidebarOpen', 'false');
        
        if (window.innerWidth < 768) {
            backdrop.classList.add('hidden');
            document.body.style.overflow = ''; // Restore scrolling
        }
    }
    
    function toggleSidebar() {
        if (isOpen) {
            closeSidebar();
        } else {
            openSidebar();
        }
    }

    // Toggle button event
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleSidebar();
        });
    }

    // Backdrop click event
    if (backdrop) {
        backdrop.addEventListener('click', function() {
            closeSidebar();
        });
    }

    // Close sidebar when clicking outside (for mobile)
    document.addEventListener('click', function(e) {
        if (!isOpen) return;
        
        const isClickInsideSidebar = sidebar.contains(e.target);
        const isClickOnToggle = e.target === toggleBtn || toggleBtn.contains(e.target);
        
        if (!isClickInsideSidebar && !isClickOnToggle && window.innerWidth < 768) {
            closeSidebar();
        }
    });
    
    // Close sidebar on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isOpen && window.innerWidth < 768) {
            closeSidebar();
        }
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            backdrop.classList.add('hidden');
            document.body.style.overflow = '';
            if (isOpen) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            }
        } else if (isOpen) {
            backdrop.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    });
    
    // Initialize sidebar state
    if (isOpen) {
        openSidebar();
    } else {
        closeSidebar();
    }
    
    // Prevent clicks inside sidebar from closing it
    sidebar.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});