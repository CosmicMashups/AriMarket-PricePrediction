document.addEventListener('DOMContentLoaded', function() {
    const logo = document.getElementById('logo_open_nav');
    const navPane = document.getElementById('left-nav-pane');
    const overlay = document.getElementById('nav-overlay');

    logo.addEventListener('click', function() {
        // Check if the device is in mobile mode (max-width: 768px)
        if (window.innerWidth <= 768) {
            navPane.classList.toggle('active'); // Toggle the active class
            overlay.classList.toggle('active'); // Toggle the overlay
            console.log(navPane.classList.contains('active') ? 'Showing left-nav-pane...' : 'Hiding left-nav-pane...');
        }
    });

    // Close the nav pane when clicking outside of it
    document.addEventListener('click', function(event) {
        // Check if the click was outside the nav pane and the logo
        if (!navPane.contains(event.target) && !logo.contains(event.target) && navPane.classList.contains('active')) {
            navPane.classList.remove('active'); // Hide it
            overlay.classList.remove('active'); // Hide overlay
            console.log('Hiding left-nav-pane because clicked outside...');
        }
    });
});
