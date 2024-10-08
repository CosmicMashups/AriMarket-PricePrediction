function updateDate() {
    const now = new Date();
    const options = {
        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
    };
    document.getElementById('date-time').innerHTML = now.toLocaleDateString('en-US', options);
}

// Call the function once to display the current date
updateDate();

// Optionally, you can set an interval if you want to update it regularly, but it may not be necessary for the date.
// Updates every 24 hours (once a day)
setInterval(updateDate, 86400000); 