document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('lineChart').getContext('2d');

    // Create a new Chart
    const lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Price Forecast of Whole Chicken',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                data: [0, 10, 5, 2, 20, 30, 45, 25, 35, 15, 40],
                fill: true,
            }]
        },
        options: {
            // Set to false to control dimensions
            maintainAspectRatio: false,

            scales: {
                x: {
                    ticks: {
                        color: 'white' // Set x-axis tick color to white
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white' // Set y-axis tick color to white
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
});