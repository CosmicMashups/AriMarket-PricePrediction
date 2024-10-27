console.log('Working...');

// Fetch theme from localStorage
function getCurrentTheme() {
    return localStorage.getItem('theme') === 'dark' ? 'dark' : 'light';
}

// Define color schemes for dark and light modes
const darkModeColors = {
    expectedBackgroundColor: 'rgba(108, 229, 232, 0.2)',
    expectedBorderColor: 'rgba(108, 229, 232, 1)',
    highBackgroundColor: 'rgba(255, 99, 132, 0.2)',
    highBorderColor: 'rgba(255, 99, 132, 1)',
    lowBackgroundColor: 'rgba(144, 238, 144, 0.2)',
    lowBorderColor: 'rgba(144, 238, 144, 1)',
    textColor: 'white',
    gridColor: 'rgba(255, 255, 255, 0.1)'
};

const lightModeColors = {
    expectedBackgroundColor: 'rgba(0, 123, 255, 0.2)',
    expectedBorderColor: 'rgba(0, 123, 255, 1)',
    highBackgroundColor: 'rgba(220, 20, 60, 0.2)',
    highBorderColor: 'rgba(220, 20, 60, 1)',
    lowBackgroundColor: 'rgba(34, 139, 34, 0.2)',
    lowBorderColor: 'rgba(34, 139, 34, 1)',
    textColor: 'black',
    gridColor: 'rgba(0, 0, 0, 0.1)'
};

// Function to update chart colors based on theme
function updateChartTheme(chart, theme) {
    const colors = theme === 'dark' ? darkModeColors : lightModeColors;

    // Update chart properties
    chart.data.datasets.forEach(dataset => {
        if (dataset.label === 'Expected') {
            dataset.backgroundColor = colors.expectedBackgroundColor;
            dataset.borderColor = colors.expectedBorderColor;
        } else if (dataset.label === 'High') {
            dataset.backgroundColor = colors.highBackgroundColor;
            dataset.borderColor = colors.highBorderColor;
        } else if (dataset.label === 'Low') {
            dataset.backgroundColor = colors.lowBackgroundColor;
            dataset.borderColor = colors.lowBorderColor;
        }
    });
    
    chart.options.scales.x.title.color = colors.textColor;
    chart.options.scales.x.ticks.color = colors.textColor;
    chart.options.scales.x.grid.color = colors.gridColor;
    
    chart.options.scales.y.title.color = colors.textColor;
    chart.options.scales.y.ticks.color = colors.textColor;
    chart.options.scales.y.grid.color = colors.gridColor;
    
    chart.options.plugins.legend.labels.color = colors.textColor;

    // Update the chart to reflect changes
    chart.update();
}

// Fetch the predictions and plot the chart
fetch('../../json/white_potato.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Ensure dates and prices are present in the data
        if (!data.dates || !data.high_prices || !data.low_prices || !data.average_prices) {
            throw new Error('Invalid or missing data in JSON');
        }

        // Accessing the dates and prices from the JSON data
        const dates = data.dates;
        const highPrices = data.high_prices;
        const lowPrices = data.low_prices;
        const averagePrices = data.average_prices;

        // Accessing the first values
        const whitePotatoFirstDate = dates[0];
        const whitePotatoFirstPrice = Math.round(averagePrices[0] * 100) / 100;
        const whitePotatoFirstHighPrice = Math.round(highPrices[0] * 100) / 100;
        const whitePotatoFirstLowPrice = Math.round(lowPrices[0] * 100) / 100;

        // Function to format date from YYYY-MM-DD to "Month DD, YYYY"
        function formatDate(dateString) {
            const date = new Date(dateString);
            const options = { year: 'numeric', month: 'long', day: '2-digit' };
            return date.toLocaleDateString('en-US', options); 
        }

        // Format the first date
        const whitePotatoFormattedFirstDate = formatDate(whitePotatoFirstDate);

        // Displaying the first values in HTML elements
        document.getElementById('whitePotatoFirstDate').innerText = `As of ${whitePotatoFormattedFirstDate}`;
        document.getElementById('whitePotatoFirstPrice').innerText = `₱${whitePotatoFirstPrice}`;
        document.getElementById('whitePotatoFirstHighPrice').innerText = `₱${whitePotatoFirstHighPrice}`;
        document.getElementById('whitePotatoFirstLowPrice').innerText = `₱${whitePotatoFirstLowPrice}`;

        // Check if the canvas context is available
        const ctx = document.getElementById('whitePotatoChart').getContext('2d');
        if (!ctx) {
            throw new Error('Canvas element not found');
        }

        // Determine the current theme
        const theme = getCurrentTheme();
        const colors = theme === 'dark' ? darkModeColors : lightModeColors;

        // Create the chart
        const whitePotatoChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [
                    {
                        label: 'Expected',
                        backgroundColor: colors.expectedBackgroundColor,
                        borderColor: colors.expectedBorderColor,
                        data: averagePrices,
                        fill: false,
                    },
                    {
                        label: 'High',
                        backgroundColor: colors.highBackgroundColor,
                        borderColor: colors.highBorderColor,
                        data: highPrices,
                        fill: false,
                    },
                    {
                        label: 'Low',
                        backgroundColor: colors.lowBackgroundColor,
                        borderColor: colors.lowBorderColor,
                        data: lowPrices,
                        fill: true,
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date',
                            color: colors.textColor,
                            font: {
                                family: 'LTInstitute',
                                size: 16,
                                style: 'normal',
                            }
                        },
                        ticks: {
                            color: colors.textColor,
                            maxRotation: 0,
                            minRotation: 0,
                        },
                        grid: {
                            color: colors.gridColor
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Price (₱)',
                            color: colors.textColor,
                            font: {
                                family: 'LTInstitute',
                                size: 16,
                                style: 'normal',
                            }
                        },
                        beginAtZero: true,
                        ticks: {
                            color: colors.textColor,
                        },
                        grid: {
                            color: colors.gridColor
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: colors.textColor
                        }
                    }
                },
                elements: {
                    line: {
                        tension: 0.3
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

        // Listen for theme toggle and update chart accordingly
        const toggleSwitch = document.getElementById('toggleSwitch');
        toggleSwitch.addEventListener('change', () => {
            const newTheme = toggleSwitch.checked ? 'dark' : 'light';
            updateChartTheme(whitePotatoChart, newTheme); // Update chart colors dynamically
        });
    })
    .catch(error => {
        console.error('Error fetching the predictions:', error);
    });
