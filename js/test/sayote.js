// JavaScript to fetch the predictions from the JSON file and display them in a line chart
console.log('Working...')

fetch('../json/sayote.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })

    .then(data => {
        // Ensure dates and prices are present in the data
        if (!data.dates || !data.prices || data.dates.length === 0 || data.prices.length === 0) {
            throw new Error('Invalid or missing data in JSON');
        }

        // Accessing the dates and prices from the JSON data
        const dates = data.dates;
        const prices = data.prices;

        // Check if the canvas context is available
        const ctx = document.getElementById('predictionChart').getContext('2d');
        if (!ctx) {
            throw new Error('Canvas element not found');
        }

        // Create a line chart using Chart.js
        const predictionChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Price Prediction',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    data: prices,
                    fill: true,
                }]
            },
            options: {
                maintainAspectRatio: false, // Set to false to control dimensions
    
                scales: {
                    x: {
                        ticks: {
                            color: 'white', // Set x-axis tick color to white
                            maxRotation: 90, // Set maximum rotation for tick labels
                            minRotation: 90, // Set minimum rotation for tick labels
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white', // Set y-axis tick color to white
                        }
                    }
                },
    
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'white' // Change legend text color if necessary
                        }
                    }
                },
    
                elements: {
                    line: {
                        tension: 0.3 // Optional: Controls the smoothness of the line
                    }
                },
    
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 10,
                        bottom: 10
                    }
                }
            }
        });
    })

    .catch(error => {
        console.error('Error fetching the predictions:', error);
    });