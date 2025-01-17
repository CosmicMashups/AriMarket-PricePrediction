console.log('Working...');

// Reusable function: Fetch and update prices
function fetchAndUpdatePrice(jsonPath, elementId) {
    fetch(jsonPath)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`Network response was not ok for ${jsonPath}`);
            }
            return response.json();
        })
        .then((data) => {
            const dates = data.dates;
            const averagePrices = data.average_prices;

            const today = new Date().toISOString().split('T')[0];
            const todayIndex = dates.findIndex((date) => date === today);

            const latestPrice =
                todayIndex !== -1
                    ? Math.round(averagePrices[todayIndex] * 100) / 100
                    : Math.round(averagePrices[0] * 100) / 100;

            document.getElementById(elementId).innerText = `₱${latestPrice}/kg`;
        })
        .catch((error) => console.error(`Error fetching or processing data for ${jsonPath}:`, error));
}

// Function: Update prices in Dashboard
function updateTopPrices() {
    // List of items to fetch and update
    const items = [
        { jsonPath: '../json/well_milled_rice.json', elementId: 'wellMilledRiceLatestPrice' },
        { jsonPath: '../json/tomato.json', elementId: 'tomatoLatestPrice' },
        { jsonPath: '../json/whole_chicken.json', elementId: 'wholeChickenLatestPrice' },
        { jsonPath: '../json/bangus.json', elementId: 'bangusLatestPrice' },
        { jsonPath: '../json/banana_lakatan.json', elementId: 'bananaLakatanLatestPrice' }
    ];

    // Loop through each item and fetch/update prices
    items.forEach((item) => {
        fetchAndUpdatePrice(item.jsonPath, item.elementId);
    });
}

// Render the initial data on page load
document.addEventListener('DOMContentLoaded', updateTopPrices);