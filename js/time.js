function updateTime() {
    const currentTime = new Date();
    let hours = currentTime.getHours();
    const minutes = String(currentTime.getMinutes()).padStart(2, '0');
    const seconds = String(currentTime.getSeconds()).padStart(2, '0');
    let period = 'AM';

    // Convert to 12-hour format
    if (hours >= 12) {
        period = 'PM';
    }
    if (hours > 12) {
        hours = hours - 12;
    }
    if (hours === 0) {
        hours = 12; // Midnight or noon should be displayed as 12
    }

    // Pad single digit hours with a leading zero
    const paddedHours = String(hours).padStart(2, '0');

    const timeString = paddedHours + ':' + minutes + ' ' + period;
    
    document.getElementById('time-display').textContent = timeString;
}

// Update the time every second
setInterval(updateTime, 1000);

// Call updateTime immediately to show time on page load
updateTime();
