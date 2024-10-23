console.log('Working...');

// Fetch theme from localStorage
function getCurrentTheme() {
    return localStorage.getItem('theme') === 'dark' ? 'dark' : 'light';
}

// Define color schemes for dark and light modes
const darkModeColors = {
    backgroundColor: 'rgba(108, 229, 232, 0.2)',
    borderColor: 'rgba(108, 229, 232, 1)',
    textColor: 'white',
    gridColor: 'rgba(255, 255, 255, 0.1)'
};

const lightModeColors = {
    backgroundColor: 'rgba(0, 123, 255, 0.2)',
    borderColor: 'rgba(0, 123, 255, 1)',
    textColor: 'black',
    gridColor: 'rgba(0, 0, 0, 0.1)'
};

// Function to update chart colors based on theme
function updateChartTheme(chart, theme) {
    const colors = theme === 'dark' ? darkModeColors : lightModeColors;

    // Update chart properties
    chart.data.datasets[0].backgroundColor = colors.backgroundColor;
    chart.data.datasets[0].borderColor = colors.borderColor;
    
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
fetch('../../json/tilapia.json')
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

        // Accessing the first values of dates and prices
        const tilapiaFirstDate = dates[0];
        const tilapiaFirstPrice = Math.round(prices[0] * 100) / 100;

        // Function to format date from YYYY-MM-DD to "Month DD, YYYY"
        function formatDate(dateString) {
            const date = new Date(dateString);
            const options = { year: 'numeric', month: 'long', day: '2-digit' };
            return date.toLocaleDateString('en-US', options);
        }

        // Format the first date
        const formattedTilapiaFirstDate = formatDate(tilapiaFirstDate);

        // Displaying the first values in HTML elements
        document.getElementById('tilapiaFirstDate').innerText = `As of ${formattedTilapiaFirstDate}`;
        document.getElementById('tilapiaFirstPrice').innerText = `₱${tilapiaFirstPrice}`;

        // Check if the canvas context is available
        const ctx = document.getElementById('tilapiaChart').getContext('2d');
        if (!ctx) {
            throw new Error('Canvas element not found');
        }

        // Determine the current theme
        const theme = getCurrentTheme();
        const colors = theme === 'dark' ? darkModeColors : lightModeColors;

        // Create the chart
        const tilapiaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Tilapia',
                    backgroundColor: colors.backgroundColor,
                    borderColor: colors.borderColor,
                    data: prices,
                    fill: true,
                }]
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
                        },
                        max: Math.ceil(Math.max(...prices) * 1.25),
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
                        tension: 0.1
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
            updateChartTheme(tilapiaChart, newTheme);
        });
    })
    .catch(error => {
        console.error('Error fetching the predictions:', error);
    });