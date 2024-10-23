const ctx = document.getElementById('priceChart').getContext('2d');

const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['3M', '1 month', '1 week', '3 day', '1 day'],
        datasets: [{
            label: 'Price',
            data: [10, 25, 30, 35, 40],
            borderColor: '#81CFF2',
            backgroundColor: 'rgba(129, 207, 242, 0.2)',
            borderWidth: 2,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});