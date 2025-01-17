// Fetch the JSON data and create the candlestick chart
fetch('../../json/beef_brisket.json')
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        // Ensure the JSON has the expected columns
        if (
            !data.open_prices || 
            !data.high_prices || 
            !data.low_prices || 
            !data.close_prices || 
            data.open_prices.length !== data.high_prices.length ||
            data.high_prices.length !== data.low_prices.length ||
            data.low_prices.length !== data.close_prices.length
        ) {
            throw new Error('Invalid JSON format or mismatched array lengths.');
        }

        // Prepare the data for the candlestick chart
        const candlestickData = data.high_prices.map((high, index) => ({
            x: index, // Replace with a timestamp if available in your data
            o: high,
            h: data.high_prices[index],
            l: data.low_prices[index],
            c: data.low_prices[index]
        }));

        // Create the candlestick chart
        const ctx = document.getElementById('candlestickChart').getContext('2d');
        new Chart(ctx, {
            type: 'candlestick',
            data: {
                datasets: [{
                    label: 'Beef Brisket Prices',
                    data: candlestickData,
                    borderColor: 'rgba(0, 123, 255, 1)',
                    color: {
                        up: 'rgba(0, 200, 83, 0.8)', // Green for upward movement
                        down: 'rgba(244, 67, 54, 0.8)', // Red for downward movement
                        unchanged: 'rgba(100, 100, 100, 0.8)' // Gray for unchanged
                    }
                }]
            },
            options: {
                plugins: {
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
                            text: 'Time'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Price'
                        }
                    }
                }
            }
        });
    })
    .catch(error => {
        console.error('Error fetching or processing data:', error);
    });
