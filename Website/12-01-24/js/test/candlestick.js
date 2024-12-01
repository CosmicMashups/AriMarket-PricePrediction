const startingDate = luxon.DateTime.fromRFC2822('27 Nov 2024 08:00 GMT')
const date2 = luxon.DateTime.fromRFC2822('28 Nov 2024 08:00 GMT')
const date3 = luxon.DateTime.fromRFC2822('29 Nov 2024 08:00 GMT')
const date4 = luxon.DateTime.fromRFC2822('30 Nov 2024 08:00 GMT')
const date5 = luxon.DateTime.fromRFC2822('1 Dec 2024 08:00 GMT')
const date6 = luxon.DateTime.fromRFC2822('2 Dec 2024 08:00 GMT')
const date7 = luxon.DateTime.fromRFC2822('3 Dec 2024 08:00 GMT')

// setup 
const data = {
    datasets: [{
        data: [
            {
                x: startingDate.valueOf(),
                o: 1,
                h: 1.50,
                l: 0.75,
                c: 1.25
            },
            {
                x: date2.valueOf(),
                o: 1.25,
                h: 1.50,
                l: 0.50,
                c: 0.90
            },
            {
                x: date3.valueOf(),
                o: 0.90,
                h: 2.00,
                l: 0.90,
                c: 2.00
            },
            {
                x: date4.valueOf(),
                o: 2.00,
                h: 3.50,
                l: 1.50,
                c: 3.00
            },
            {
                x: date5.valueOf(),
                o: 3.00,
                h: 4.50,
                l: 3.00,
                c: 4.00
            },
            {
                x: date6.valueOf(),
                o: 4.00,
                h: 5.50,
                l: 3.50,
                c: 3.50
            },
            {
                x: date7.valueOf(),
                o: 3.50,
                h: 9.50,
                l: 3.50,
                c: 9.50
            },
        ],
    }]
};

// config 
const config = {
    type: 'candlestick',
    data,
    options: {}
};

// render init block
const candleStickChart = new Chart(
    document.getElementById('candleStickChart'),
    config
);