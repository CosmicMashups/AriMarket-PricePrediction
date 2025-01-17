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
    expectedBackgroundColor: 'rgba(113, 175, 255, 0.2)',
    expectedBorderColor: 'rgba(25, 136, 255, 1)',
    highBackgroundColor: 'rgba(255, 95, 107, 0.2)',
    highBorderColor: 'rgba(220, 0, 44, 1)',
    lowBackgroundColor: 'rgba(125, 222, 112, 0.2)',
    lowBorderColor: 'rgba(34, 139, 34, 1)',
    textColor: 'rgba(32, 53, 85, 1)',
    gridColor: 'rgba(32, 53, 85, 0.2)'
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

// Fetch the predictions and plot the charts
fetch('../../json/beef_brisket.json')
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

        // Get today's date in YYYY-MM-DD format
        const today = new Date().toISOString().split('T')[0];

        // Find the index of today's date
        const todayIndex = dates.findIndex(date => date === today);

        // Variables for today's date or the first available date
        let beefBrisketFirstDate, beefBrisketFirstPrice, beefBrisketFirstHighPrice, beefBrisketFirstLowPrice;

        if (todayIndex !== -1) {
            // If today's date is found in the data
            beefBrisketFirstDate = dates[todayIndex];
            beefBrisketFirstPrice = Math.round(averagePrices[todayIndex] * 100) / 100;
            beefBrisketFirstHighPrice = Math.round(highPrices[todayIndex] * 100) / 100;
            beefBrisketFirstLowPrice = Math.round(lowPrices[todayIndex] * 100) / 100;
        } else {
            // Default to the first available date if today's date is not in the data
            console.warn('Today\'s date not found in data. Using the first available date.');
            beefBrisketFirstDate = dates[0];
            beefBrisketFirstPrice = Math.round(averagePrices[0] * 100) / 100;
            beefBrisketFirstHighPrice = Math.round(highPrices[0] * 100) / 100;
            beefBrisketFirstLowPrice = Math.round(lowPrices[0] * 100) / 100;
        }

        // Function to format date from YYYY-MM-DD to "Month DD, YYYY"
        function formatDate(dateString) {
            const date = new Date(dateString);
            const options = { year: 'numeric', month: 'long', day: '2-digit' };
            return date.toLocaleDateString('en-US', options); 
        }

        // Format the first date
        const beefBrisketFormattedFirstDate = formatDate(beefBrisketFirstDate);

        // Displaying the first values in HTML elements
        document.getElementById('beefBrisketFirstDate').innerText = `As of ${beefBrisketFormattedFirstDate}`;
        document.getElementById('beefBrisketFirstPrice').innerText = `₱${beefBrisketFirstPrice}`;
        document.getElementById('beefBrisketFirstHighPrice').innerText = `₱${beefBrisketFirstHighPrice}`;
        document.getElementById('beefBrisketFirstLowPrice').innerText = `₱${beefBrisketFirstLowPrice}`;

        const theme = getCurrentTheme();
        const colors = theme === 'dark' ? darkModeColors : lightModeColors;

        // Line Chart
        const ctxLine = document.getElementById('beefBrisketChart').getContext('2d');

        // Calculate a large enough width based on the number of labels (dates)
        const chartWidth = dates.length * 50; // Adjust the multiplier (50) as needed for spacing

        // Set the canvas width dynamically
        document.getElementById('beefBrisketChart').width = chartWidth;
        document.getElementById('beefBrisketScatter').width = chartWidth;
        document.getElementById('beefBrisketPie').width = chartWidth;
        document.getElementById('beefBrisketHistogram').width = chartWidth;

        const lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [
                    { label: 'Expected', backgroundColor: colors.expectedBackgroundColor, borderColor: colors.expectedBorderColor, data: averagePrices, fill: false },
                    { label: 'High', backgroundColor: colors.highBackgroundColor, borderColor: colors.highBorderColor, data: highPrices, fill: false },
                    { label: 'Low', backgroundColor: colors.lowBackgroundColor, borderColor: colors.lowBorderColor, data: lowPrices, fill: true }
                ]
            },
            options: {
                responsive: false,  // Disable responsiveness
                maintainAspectRatio: false,  // Allow flexibility in chart size
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

        // Scatter Chart
        const ctxScatter = document.getElementById('beefBrisketScatter').getContext('2d');
        const scatterChart = new Chart(ctxScatter, {
            type: 'scatter',
            data: {
                datasets: [
                    {
                        label: 'Expected',
                        backgroundColor: colors.expectedBackgroundColor,
                        borderColor: colors.expectedBorderColor,
                        data: dates.map((date, i) => ({
                            x: new Date(date).getTime(), // Convert date to timestamp
                            y: averagePrices[i]
                        }))
                    },
                    {
                        label: 'High',
                        backgroundColor: colors.highBackgroundColor,
                        borderColor: colors.highBorderColor,
                        data: dates.map((date, i) => ({
                            x: new Date(date).getTime(), // Convert date to timestamp
                            y: highPrices[i]
                        }))
                    },
                    {
                        label: 'Low',
                        backgroundColor: colors.lowBackgroundColor,
                        borderColor: colors.lowBorderColor,
                        data: dates.map((date, i) => ({
                            x: new Date(date).getTime(), // Convert date to timestamp
                            y: lowPrices[i]
                        }))
                    }
                ]
            },
            options: {
                responsive: true,  // Ensure responsiveness
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
                        beginAtZero: false,  // Disable beginning at zero (can be adjusted as needed)
                        ticks: {
                            color: colors.textColor,
                            // Optional: Adjust stepSize to control tick intervals
                            stepSize: 10, // Adjust based on your price range
                            // You can also set a min and max for the y-axis if you want more control
                            min: Math.min(...lowPrices) - 10,  // Adjust to fit your data range
                            max: Math.max(...highPrices) + 10, // Adjust to fit your data range
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

        // Pie Donut Chart
        const ctxPie = document.getElementById('beefBrisketPie').getContext('2d');
        const pieDonutChart = new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['High', 'Low', 'Expected'],
                datasets: [{
                    backgroundColor: [colors.highBackgroundColor, colors.lowBackgroundColor, colors.expectedBackgroundColor],
                    borderColor: [colors.highBorderColor, colors.lowBorderColor, colors.expectedBorderColor],
                    data: [highPrices.reduce((a, b) => a + b, 0), lowPrices.reduce((a, b) => a + b, 0), averagePrices.reduce((a, b) => a + b, 0)]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: '',
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
                            text: '',
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

        // Histogram Chart
        const ctxHistogram = document.getElementById('beefBrisketHistogram').getContext('2d');
        const histogramChart = new Chart(ctxHistogram, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [
                    { label: 'Expected', backgroundColor: colors.expectedBorderColor, borderColor: colors.expectedBackgroundColor, data: averagePrices },
                    { label: 'High', backgroundColor: colors.highBorderColor, borderColor: colors.highBackgroundColor, data: highPrices },
                    { label: 'Low', backgroundColor: colors.lowBorderColor, borderColor: colors.lowBackgroundColor, data: lowPrices }
                ]
            },
            options: {
                responsive: false,
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

        // Listen for theme toggle and update charts
        const toggleSwitch = document.getElementById('toggleSwitch');
        toggleSwitch.addEventListener('change', () => {
            const newTheme = toggleSwitch.checked ? 'dark' : 'light';
            [lineChart, scatterChart, pieDonutChart, histogramChart].forEach(chart => updateChartTheme(chart, newTheme));
        });
    })
    .catch(error => {
        console.error('Error fetching the predictions:', error);
    });