// JavaScript to fetch the predictions from the JSON file and display them in a line chart
console.log('Working...')

fetch('../json/whole_chicken.json')
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
                maintainAspectRatio: false,
    
                scales: {
                    x: {
                        ticks: {
                            color: 'white',
                            maxRotation: 90,
                            minRotation: 90,
                            font: {
                                family: 'LTInstitute',
                                size: 16,
                                style: 'normal',
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white',
                            font: {
                                family: 'LTInstitute',
                                size: 16,
                                style: 'normal',
                            }
                        }
                    }
                },
    
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'white',
                            font: {
                                family: 'LTInstitute',
                                size: 16,
                                style: 'normal',
                            }
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