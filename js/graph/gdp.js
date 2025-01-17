document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('GDPChart').getContext('2d');

    // Function to determine the current theme and return the corresponding text color
    function getTextColor() {
        return localStorage.getItem('theme') === 'dark' ? 'white' : 'black';
    }

    // Function to update the chart with the appropriate text color
    function createGDPChart(textColor) {
        return new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Q4 2023', 'Q1 2024', 'Q2 2024', 'Q3 2024'],
                datasets: [{
                    label: 'GDP',
                    data: [5.5, 5.8, 6.4, 5.2],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)', // Color for Q1
                        'rgba(255, 99, 132, 0.6)', // Color for Q2
                        'rgba(75, 192, 192, 0.6)', // Color for Q3
                        'rgba(255, 99, 132, 0.6)'  // Color for Q4
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 0.6)', // Color for Q1
                        'rgba(255, 99, 132, 0.6)', // Color for Q2
                        'rgba(75, 192, 192, 0.6)', // Color for Q3
                        'rgba(255, 99, 132, 0.6)'  // Color for Q4
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: textColor, // Set x-tick color
                        },
                        title: {
                            display: true,
                            text: 'Quarter',
                            color: textColor, // Set x-title color
                            font: {
                                family: 'LTInstitute',
                                size: 16,
                                style: 'normal',
                            }
                        }
                    },
                    y: {
                        ticks: {
                            color: textColor, // Set y-tick color
                        },
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'GDP Value',
                            color: textColor,
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
                        display: false,
                        labels: {
                            color: textColor, // Set legend label color
                            font: {
                                family: 'LTInstitute',
                                size: 16,
                                style: 'normal',
                            }
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
                }
            }
        });
    }

    // Initial chart rendering with the correct theme
    let GDPChart = createGDPChart(getTextColor());

    // Listen for theme toggle changes
    const toggleSwitch = document.getElementById('toggleSwitch'); // Assuming a theme toggle switch exists with this ID
    toggleSwitch.addEventListener('change', () => {
        const newTextColor = getTextColor();

        // Destroy the old chart instance
        GDPChart.destroy();

        // Create a new chart with updated text color
        GDPChart = createGDPChart(newTextColor);
    });
});