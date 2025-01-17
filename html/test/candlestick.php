<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Getting Started with Chart JS with www.chartjs3.com</title>
        <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        .chartMenu {
            width: 100vw;
            height: 40px;
            background: #1A1A1A;
            color: rgba(54, 162, 235, 1);
        }
        .chartMenu p {
            padding: 10px;
            font-size: 20px;
        }
        .chartCard {
            width: 100vw;
            height: calc(100vh - 40px);
            background: rgba(54, 162, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .chartBox {
            width: 700px;
            padding: 20px;
            border-radius: 20px;
            border: solid 3px rgba(54, 162, 235, 1);
            background: white;
        }
        </style>
    </head>
    <body>
        <div class="chartMenu">
        <p>Candlestick Chart (Chart JS <span id="chartVersion"></span>)</p>
        </div>
        <div class="chartCard">
        <div class="chartBox">
            <canvas id="candleStickChart"></canvas>
        </div>
        </div>


        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.5.0/luxon.min.js" integrity="sha512-SN7iwxiJt9nFKiLayg3NjLItXPwRfBr4SQSIugMeBFrD4lIFJe1Z/exkTZYAg3Ul+AfZEGws2PQ+xSoaWfxRQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.1"></script>
        <script src="../../js/chartjs_financial.js"></script>

        <script src="../../js/test/candlestick.js"></script>

</body>
</html>

