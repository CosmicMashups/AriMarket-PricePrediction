// Get the toggle switch element
const toggleSwitch = document.getElementById('toggleSwitch');

// Function to set the theme
function setTheme(isDark) {
    if (isDark) {
        document.body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark');
    } else {
        document.body.classList.remove('dark-mode');
        localStorage.setItem('theme', 'light');
    }
}

// Check local storage for theme preference on page load
window.onload = () => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        setTheme(true);
        toggleSwitch.checked = true; // Set the toggle switch to checked if dark mode is saved
    } else {
        setTheme(false);
    }
};

// Event listener for toggle switch
toggleSwitch.addEventListener('change', () => {
    setTheme(toggleSwitch.checked);
});