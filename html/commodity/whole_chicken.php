<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whole Chicken | AriMarket</title>
    <link rel="stylesheet" href="../../css/home.css">   
    <link rel="stylesheet" href="../../css/specific-commodity.css">   
    <link rel="stylesheet" href="../../css/specific_commodity_mobile.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
</head>
<body>
  <div id='container'>

    <!-- Overlay -->
    <div id="nav-overlay"></div>
            
    <!-- Contents: Left -->
    <div id='pseudo-top-nav'></div>

    <!-- Mobile: Top Navigation Bar -->
    <div id='top-nav-bar'>
        <button id='logo_open_nav' onclick="">ARIMARKET</button>
    </div>
                
    <!-- Container: Navigation Pane -->
    <div id='left-nav-pane'>
        <!-- Logo -->
        <center><span id='logo'><a href="../home.php"><img src='../../images/icon_arimarket.png' id='main-icon'></a></span></center>
        <center><span id='left-nav-label'><a href="../home.php"><img src='../../images/icon_arimarket.png' id='main-icon'></a></span></center>
      
      <!-- Nav: Navigation Pane -->
      <nav>
          <a href="../home.php"><span id='nav-link'><i class="fa-solid fa-square-poll-vertical"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</span></a>
          <a href="../commodities.php" class='active'><span id='nav-link'><i class="fa-solid fa-store"></i>&nbsp;&nbsp;&nbsp;&nbsp;Commodities</span></a>
          <a href="../contacts.php"><span id='nav-link'><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;Contact Us</span></a>
          <a href="../about.php"><span id='nav-link'><i class="fa-sharp fa-solid fa-circle-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;About</span></a>
      </nav>
   
      <!-- Widget: Why Use This App? -->
      <div id='widget-nav'>
          <div id='widget-nav-content'>
              <h2>Why Use This App?</h2>
              <p>A price prediction system helps buyers make informed decisions by forecasting future commodity prices, allowing them to optimize their purchases and avoid overpaying in a fluctuating market.</p>
          </div>
      </div>

      <!-- Widget: Dark Mode -->
      <div id='widget-theme'>      
          <div id='widget-nav-label'>
              <h1>Dark Mode</h1>   
          </div>    
          <label class="switch">
              <input type="checkbox" id="toggleSwitch">
              <span class="slider round"></span>
          </label>
      </div>

    </div>

    <main>
        <!-- Container -->
        <div id='content-single-container'>
                
            <!-- Container: Empty Navigation Pane -->
            <div id='pseudo-nav'>

            </div>

            <!-- Container: Content -->
            <div id='content-center-container'>
                <!-- Widget -->
                <div id='widget-commodity-header'>
                    <!-- Logo -->
                    <div id='specific-commodity-logo'>
                        <img src="../../images/commodity/chicken.png" alt="Meat Logo" class="specific-commodity-logo-img">
                    </div>

                    <!-- Container: Header -->
                    <div id='specific-commodity-content'>
                        
                        <!-- Container: Label and Date -->
                        <div id='specific-commodity-label-date'>
                        
                            <!-- Container: Label -->
                            <div id='specific-commodity-label'><h1>Whole Chicken</h1></div>
                            
                            <!-- Container: Date -->
                            <div id='specific-commodity-date'>

                                <!-- Rectangle: Date -->
                                <div id='specific-commodity-date-rectangle'>
                                    <h3 id='wholeChickenFirstDate'></h3>
                                </div>
                            </div>

                        </div>
                        
                        <!-- Container: Three Prices -->
                        <div id='specific-commodity-prices'>       
                            <!-- Container: Expected Price -->
                            <div id='specific-commodity-average-price' class='priceTypeTooltip'>                        
                                <div id='specific-commodity-prices-rectangle'>
                                    <div id='specific-commodity-prices-icon'>
                                        <h2><i class="fa-solid fa-star"></i></h2>
                                    </div>
                                    <div id='specific-commodity-prices-label'>
                                        <h2 id="wholeChickenFirstPrice"></h2>
                                    </div>
                                </div>                        
                                <span class="priceTypeTooltipText">Expected Price</span> 
                            </div>
                        
                            <!-- Container: High Price -->
                            <div id='specific-commodity-high-price' class='priceTypeTooltip'>
                                <div id='specific-commodity-prices-rectangle'>
                                    <div id='specific-commodity-prices-icon'>
                                        <h2><i class="fa-solid fa-arrow-up"></i></h2>
                                    </div>
                                    <div id='specific-commodity-prices-label'>
                                        <h2 id="wholeChickenFirstHighPrice"></h2>
                                    </div>
                                </div>
                                <span class="priceTypeTooltipText">Highest Price</span> 
                            </div>
                        
                            <!-- Container: Low Price -->
                            <div id='specific-commodity-low-price' class='priceTypeTooltip'>
                                <div id='specific-commodity-prices-rectangle'>
                                    <div id='specific-commodity-prices-icon'>
                                        <h2><i class="fa-solid fa-arrow-down"></i></h2>
                                    </div>
                                    <div id='specific-commodity-prices-label'>
                                        <h2 id="wholeChickenFirstLowPrice"></h2>
                                    </div>                                    
                                </div>
                                <span class="priceTypeTooltipText">Lowest Price</span> 
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Commodity: Graphs and Types -->
                <div id='widget-commodity-graph-types'> 
                    <!-- Container: Graph -->   
                    <div id="widget-commodity-graph">                            

                        <!-- Chart Options -->
                        <div class="chart-options">
                            <div class="filter-section">
                                <label for="filterType">Filter:</label>
                                <select id="filterType" class="chart-select">
                                    <option value="all" selected>All Time</option>
                                    <option value="year">By Year</option>
                                    <option value="month">By Month</option>
                                </select>
                            </div>

                            <div>
                                <h2>Price Forecast</h2>
                            </div>

                            <div class="chart-type-section">
                                <label for="chartType">Chart:</label>
                                <select id="chartType" class="chart-select">
                                    <option value="line" selected>Line</option>
                                    <option value="scatter">Scatter</option>
                                    <option value="candlestick">Candlestick</option>
                                    <option value="histogram">Histogram</option>
                                </select>
                            </div>
                        </div>

                        <!-- Actual Chart -->
                        <div class="chart">
                            <canvas class="commodity-chart" id="chartCanvas" width="750" height="400"></canvas>
                        </div>
                    </div>

                    <!-- Container: Other Commodity Types -->
                    <div id='widget-commodity-types'>
                        <h1>Other Commodities</h1>
                        <a href='beef_brisket.php'>
                            <div id='specific-commodity-types-rectangle'><h3>Beef Brisket</h3></div>
                        </a>

                        <a href='beef_rump.php'>
                            <div id='specific-commodity-types-rectangle'><h3>Beef Rump</h3></div>
                        </a>

                        <a>
                            <div id='specific-commodity-types-rectangle' class="active"><h3>Whole Chicken</h3></div>
                        </a>

                        <a href='pork_belly.php'>
                            <div id='specific-commodity-types-rectangle'><h3>Pork Belly</h3></div>
                        </a>

                        <a href='pork_ham.php'>
                            <div id='specific-commodity-types-rectangle'><h3>Pork Ham</h3></div>
                        </a>

                        <!-- Button: Previous Page -->
                        <button class="back-btn" onclick="window.location.href='../commodities.php'"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back to list</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- <div id="particles-js"></div> -->
        
    </main>

    </div>

    <!-- Scripts -->
    <!-- For dark mode -->
    <script src="../../js/dark-mode.js"></script>

    <!-- For mobile view -->
    <script src="../../js/mobile_nav.js"></script>

    <!-- For candlestick graph -->     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/3.5.0/luxon.min.js" integrity="sha512-SN7iwxiJt9nFKiLayg3NjLItXPwRfBr4SQSIugMeBFrD4lIFJe1Z/exkTZYAg3Ul+AfZEGws2PQ+xSoaWfxRQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.1"></script>

    <!-- For specific commodity prices data -->     
    <script src="../../js/graph/whole_chicken.js"></script>

    <!-- For chart generation -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../js/chartjs_financial.js"></script>

    <!-- For moving particles -->
    <script src="../../js/particles.js"></script>
    <script src="../../js/app.js"></script>
  
</body>
</html>