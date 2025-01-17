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
    gridColor: 'rgba(255, 255, 255, 0.1)',
};

const lightModeColors = {
    expectedBackgroundColor: 'rgba(113, 175, 255, 0.2)',
    expectedBorderColor: 'rgba(25, 136, 255, 1)',
    highBackgroundColor: 'rgba(255, 95, 107, 0.2)',
    highBorderColor: 'rgba(220, 0, 44, 1)',
    lowBackgroundColor: 'rgba(125, 222, 112, 0.2)',
    lowBorderColor: 'rgba(34, 139, 34, 1)',
    textColor: 'rgba(32, 53, 85, 1)',
    gridColor: 'rgba(32, 53, 85, 0.2)',
};

// Chart instance
let chart;

// Function to render the chart based on type
function renderChart(type, dates, averagePrices, highPrices, lowPrices) {
    const theme = getCurrentTheme();
    const colors = theme === 'dark' ? darkModeColors : lightModeColors;
    const canvas = document.getElementById('chartCanvas');
    const ctx = canvas.getContext('2d');    

    // Ensure the chartCanvas element exists
    const chartCanvas = document.getElementById('chartCanvas');
    if (chartCanvas) {
        // Calculate a width that ensures proper spacing for the chart based on the number of dates
        const chartWidth = Math.max(dates.length * 50, 400); // Ensure a minimum width of 400px

        // Set the canvas width dynamically
        chartCanvas.style.width = `${chartWidth}px`; // Adjust CSS width for layout
        chartCanvas.width = chartWidth; // Adjust internal canvas width for rendering
    } else {
        console.error('chartCanvas element not found');
    }

    // If a chart is displayed and you want to display a new chart, destroy the existing chart first
    if (chart) {
        chart.destroy();
    }

    if (type === 'line') {
        chart = new Chart(ctx, {
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

    } else if (type === 'scatter') {
        chart = new Chart(ctx, {
            type: 'scatter',
            data: {
                datasets: [
                    {
                        label: 'Price Range',
                        data: dates.map((date, index) => ({
                            x: highPrices[index],
                            y: lowPrices[index],
                        })),
                        backgroundColor: colors.highBackgroundColor,
                        borderColor: colors.highBorderColor,
                    },
                ],
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
        
    } else if (type === 'candlestick') {
        // Prepare the data for the candlestick chart
        const candlestickData = highPrices.map((high, index) => ({
            x: index,
            // For the first data point, use the same price as 'open'
            o: index > 0 ? lowPrices[index - 1] : lowPrices[index], 
            h: high,
            l: lowPrices[index],
            c: lowPrices[index]
        }));

        // Render Candlestick Chart
        chart = new Chart(ctx, {
            type: 'candlestick', // Ensure the correct type for a Chart.js plugin
            data: {
                datasets: [{
                    label: 'Price Range',
                    data: candlestickData, // Use formatted candlestick data
                    borderColor: 'rgba(0, 123, 255, 0.8)', // Customize colors
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: false,
                        text: 'Candlestick Chart'
                    },
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: context => {
                                const { o, h, l, c } = context.raw;
                                return `Open: ${o}, High: ${h}, Low: ${l}, Close: ${c}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        type: 'linear',
                        title: {
                            display: true,
                            text: 'Time',
                            color: colors.textColor,
                            font: {
                                family: 'LTInstitute',
                                size: 16,
                                style: 'normal',
                            },
                            ticks: {
                                color: colors.textColor,
                            },
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Price',
                            color: colors.textColor,
                            font: {
                                family: 'LTInstitute',
                                size: 16,
                                style: 'normal',
                            },
                            ticks: {
                                color: colors.textColor,
                            },
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
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 10,
                        bottom: 10
                    }
                },
            }
        });
        

    } else if (type === 'histogram') {
        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [
                    { label: 'Expected', backgroundColor: colors.expectedBorderColor, borderColor: colors.expectedBorderColor, data: averagePrices },
                    { label: 'High', backgroundColor: colors.highBorderColor, borderColor: colors.highBorderColor, data: highPrices },
                    { label: 'Low', backgroundColor: colors.lowBorderColor, borderColor: colors.lowBorderColor, data: lowPrices }
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
    }
}

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

        // Apply the exception for histogram chart type
        if (chart.config.type === 'bar' || chart.config.type === 'histogram') {
            // Set backgroundColor to be the same as borderColor for histogram charts
            dataset.backgroundColor = dataset.borderColor;
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

// Initialize chart and filter types from localStorage
const savedFilterType = localStorage.getItem('filterType') || 'all';
const savedChartType = localStorage.getItem('chartType') || 'line';

// Set dropdown values to the saved preferences
document.getElementById('filterType').value = savedFilterType;
document.getElementById('chartType').value = savedChartType;

// Function to filter data based on filter type
function filterData(dates, averagePrices, highPrices, lowPrices, filterType) {
    let filteredDates = dates;
    let filteredHighPrices = highPrices;
    let filteredLowPrices = lowPrices;
    let filteredAveragePrices = averagePrices;

    if (filterType === 'month') {
        const currentMonth = new Date().getMonth();
        const currentYear = new Date().getFullYear();
        filteredDates = dates.filter((date, index) => {
            const [year, month] = date.split('-').map(Number);
            return year === currentYear && month - 1 === currentMonth;
        });
        const indices = filteredDates.map((date) => dates.indexOf(date));
        filteredHighPrices = indices.map((i) => highPrices[i]);
        filteredLowPrices = indices.map((i) => lowPrices[i]);
        filteredAveragePrices = indices.map((i) => averagePrices[i]);
    } else if (filterType === 'year') {
        const currentYear = new Date().getFullYear();
        filteredDates = dates.filter((date) => {
            const [year] = date.split('-').map(Number);
            return year === currentYear;
        });
        const indices = filteredDates.map((date) => dates.indexOf(date));
        filteredHighPrices = indices.map((i) => highPrices[i]);
        filteredLowPrices = indices.map((i) => lowPrices[i]);
        filteredAveragePrices = indices.map((i) => averagePrices[i]);
    }

    return { filteredDates, filteredHighPrices, filteredLowPrices, filteredAveragePrices };
}

// Unified function to render chart based on both filter type and chart type
function updateChart() {
    const filterType = document.getElementById('filterType').value;
    const chartType = document.getElementById('chartType').value;

    localStorage.setItem('filterType', filterType); // Save filter type to localStorage
    localStorage.setItem('chartType', chartType);   // Save chart type to localStorage

    fetch('../../json/tomato.json')
        .then((response) => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then((data) => {
            const dates = data.dates;
            const highPrices = data.high_prices;
            const lowPrices = data.low_prices;
            const averagePrices = data.average_prices;

            const today = new Date().toISOString().split('T')[0];
            const todayIndex = dates.findIndex((date) => date === today);

            const tomatoFirstDate = todayIndex !== -1 ? dates[todayIndex] : dates[0];
            const tomatoFirstPrice =
                todayIndex !== -1
                    ? Math.round(averagePrices[todayIndex] * 100) / 100
                    : Math.round(averagePrices[0] * 100) / 100;
            const tomatoFirstHighPrice =
                todayIndex !== -1
                    ? Math.round(highPrices[todayIndex] * 100) / 100
                    : Math.round(highPrices[0] * 100) / 100;
            const tomatoFirstLowPrice =
                todayIndex !== -1
                    ? Math.round(lowPrices[todayIndex] * 100) / 100
                    : Math.round(lowPrices[0] * 100) / 100;

            // Function to format date from YYYY-MM-DD to "Month Day, YYYY"
            function formatDate(dateString) {
                const date = new Date(dateString);
                const options = { year: 'numeric', month: 'long', day: '2-digit' };
                return date.toLocaleDateString('en-US', options); 
            }

            // Format the first date
            const tomatoFormattedFirstDate = formatDate(tomatoFirstDate);

            document.getElementById(
                'tomatoFirstDate'
            ).innerText = `As of ${tomatoFormattedFirstDate}`;
            document.getElementById(
                'tomatoFirstPrice'
            ).innerText = `₱${tomatoFirstPrice}/kg`;
            document.getElementById(
                'tomatoFirstHighPrice'
            ).innerText = `₱${tomatoFirstHighPrice}/kg`;
            document.getElementById(
                'tomatoFirstLowPrice'
            ).innerText = `₱${tomatoFirstLowPrice}/kg`;

            // Filter data based on selected filter type
            const { filteredDates, filteredHighPrices, filteredLowPrices, filteredAveragePrices } =
                filterData(dates, averagePrices, highPrices, lowPrices, filterType);

            // Render chart with filtered data and selected chart type
            renderChart(chartType, filteredDates, filteredAveragePrices, filteredHighPrices, filteredLowPrices);

            // Listen for theme toggle and update charts
            const toggleSwitch = document.getElementById('toggleSwitch');
            toggleSwitch.addEventListener('change', () => {
                const newTheme = toggleSwitch.checked ? 'dark' : 'light';
                localStorage.setItem('theme', newTheme); // Save theme to localStorage
                updateChartTheme(chart, newTheme);
            });
        })
        .catch((error) => console.error('Error fetching or processing data:', error));
}

// Add event listeners for both dropdowns
document.getElementById('filterType').addEventListener('change', updateChart);
document.getElementById('chartType').addEventListener('change', updateChart);

// Render the initial chart on page load
document.addEventListener('DOMContentLoaded', updateChart);