document.addEventListener("DOMContentLoaded", function() {
    const collapsibles = document.querySelectorAll('.collapsible-header');

    collapsibles.forEach(header => {
        header.addEventListener('click', function() {
            const collapsible = this.parentNode; // Get the parent <li> element
            collapsible.classList.toggle('expanded'); // Toggle the 'expanded' class
            
            // Toggle the visibility of the content
            const content = collapsible.querySelector('.collapsible-content');
            if (collapsible.classList.contains('expanded')) {
                content.style.maxHeight = content.scrollHeight + "px"; // Set to the scrollHeight for animation
            } else {
                content.style.maxHeight = 0; // Collapse
            }
        });
    });
});