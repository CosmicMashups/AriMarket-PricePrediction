<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | AriMarket</title>
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="../css/mobile_view.css">
    <link rel="stylesheet" href="../css/about_mobile.css">
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

        <!-- PC: Navigation Pane -->
        <div id='left-nav-pane'>
            <!-- Logo -->
            <center><span id='logo'><a href="home.php"><img src='../images/icon_arimarket.png' id='main-icon'></a></span></center>
            <center><span id='left-nav-label'><a href="home.php"><img src='../images/icon_arimarket.png' id='main-icon'></a></span></center>
          
            <!-- Navigation Menu -->
            <nav>
                <a href="home.php"><span id='nav-link'><i class="fa-solid fa-square-poll-vertical"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</span></a>
                <a href="commodities.php" ><span id='nav-link'><i class="fa-solid fa-store"></i>&nbsp;&nbsp;&nbsp;&nbsp;Commodities</span></a>
                <a href="contacts.php"><span id='nav-link'><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;Contact Us</span></a>
                <a class='active'><span id='nav-link'><i class="fa-sharp fa-solid fa-circle-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;About</span></a>
            </nav>      

            <!-- Widget: Why Use This App?  -->
            <div id='widget-nav'>
                <div id='widget-nav-content'>
                    <h2>Why Use This App?</h2>
                    <p>A price prediction system helps buyers make informed decisions by forecasting future commodity prices, allowing them to optimize their purchases and avoid overpaying in a fluctuating market.</p>
                </div>
            </div>

            <!-- Widget: Dark Mode  -->
            <div id='widget-theme'>      
                <div id='widget-nav-label'>
                    <h1>Dark Mode</h1>   
                </div>    

                <!-- Switch: Dark Mode -->
                <label class="switch">
                    <input type="checkbox" id="toggleSwitch">
                    <span class="slider round"></span>
                </label>
            </div>

        </div>

        <main>
            <div id='content-single-container'>
                      
                <!-- Contents: Left -->
                <div id='pseudo-nav'></div>

                <div id='widget-with-mascot'>
                    <!-- Overlay: 3D Mascot -->
                    <div id="mascot-model">
                        <img src="../images/model/mascot.png" id="mascot-img">
                    </div>

                    <!-- Content -->
                    <div id='widget-single-column'>
                      
                        <div id="welcome-arimarket">

                            <div id="about-header">
                                <div id="about-header-title">
                                    Welcome&nbsp;to&nbsp;<span id="ari">ARIMA</span>rket
                                </div>

                                <div id="about-header-title-mobile">
                                    Welcome&nbsp;to&nbsp;<br><span><span id="ari">ARIMA</span>rket</span>
                                </div>

                                <div id="predicting">Predicting your market price without AI, but with ARIMA</div>
                                <div id="predicting-mobile">Predicting your market price without AI, but with ARIMA</div>

                                <hr class="custom-hr">
                            </div>

                            <div id="faq">
                                <div id="how-do-i-use-arimarket">How do I use <span id="arima">ARIMA</span>rket? </div>
                                    <div id="subtext-description">To browse and view commodity prices in the application, users can navigate to the <span id="mm">Commodities page</span> through the navigation pane.
                                        This page displays various commodity groups and the specific items within each group. By selecting a commodity, such as <span id="mm">"Beef Brisket"</span>,
                                        users can access detailed price information and analysis. The page consists of multiple sections. The <span id="mm">header</span> provides the commodity's name,
                                        the current date, and three price indicators: the average price, marked with a yellow star; the highest price, marked with a red upward arrow;
                                        and the lowest price, marked with a green downward arrow. Tooltips are available for each price to clarify their meaning. </div>

                                    <div id="subtext-description">The <span id="mm">price forecast section</span> features a graph that visualizes daily high, low, and average prices. Users can customize this graph in
                                        two ways: by <span id="mm">filtering the data</span> and <span id="mm">selecting the chart type</span>. Data can be filtered to display "All Time" prices (from January 1, 2023, to present),
                                        "By Year" prices (from January 1, 2024, to today), or "By Month" prices (from the start of the current month, December, to the end of the month).
                                        Users can also choose from four graph types: a line plot (default), scatter plot, candlestick plot, or histogram. </div>

                                <div id="how-do-i-use-arimarket">What does <span id="arima">ARIMA</span>rket do? </div>
                                    <div id="subtext-description"><span id="mm">ARIMArket</span> is designed to accurately predict market prices for a wide range of essential commodities found in <span id="mm">Metro Manila</span> public markets, making it an
                                        invaluable tool for everyday budgeting and purchasing decisions. The platform focuses on items that are staples in Filipino households, including meat, fish,
                                        fruits, and vegetables. With <span id="mm">ARIMArket</span>, users can gain insights into price trends and determine the optimal time to buy, ensuring they get the best value for
                                        their money. This convenience is just a few clicks away, accessible directly from their screens, making market planning smarter, easier, and more efficient than
                                        ever before. </div>
                                    
                                <div id="how-do-i-use-arimarket">What is <span id="arima">ARIMA</span>?</div>
                                    <div id="subtext-description"><span id="mm">ARIMA (Autoregressive Integrated Moving Average)</span> is a prediction model used for forecasting future trends 
                                    through existing time series data. This model <span id="mm">predicts future trends</span> with the use of previous data to create a technical analyses on the
                                    outcome of the model. This model follows a structured algorithm to analyze and forecast time series data. First, the model identifies
                                    whether the data is stationary, meaning that its statistical properties, such as mean and variance, are consistent over time. Since ARIMA
                                    models require stationarity, <span id="mm">non-stationary data undergoes differencing</span> to stabilize the mean. This step is captured by the <span id="mm">d parameter</span>,
                                    which indicates how many times the data has been differenced to achieve stationarity. In a first-order differencing, the algorithm subtracts
                                    each observation from the previous one. If this still doesn’t stabilize the series, a <span id="mm">second-order differencing</span> may be applied.</div>
                                    
                                <div id="how-do-i-use-arimarket">Is <span id="arima">ARIMA</span>rket accurate or reliable? </div>
                                    <div id="subtext-description">While <span id="mm">ARIMArket</span> provides the ability to forecast future prices of commodities using advanced technical analysis, our team strongly
                                        encourages users to <span id="mm">exercise caution</span> and <span id="mm">maintain responsibility</span> in managing their financial decisions. The predictions generated by ARIMArket are intended to
                                        <span id="mm">serve as a helpful guide</span>, but they are not a guarantee of future market behavior. Users should consider multiple factors when making purchasing or investment
                                        decisions and should not rely solely on the application’s forecasts. It is important to approach financial responsibilities with diligence and care. <span id="mm">ARIMArket</span>
                                        and its team disclaim any liability for <span id="mm">financial outcomes</span> or losses incurred through the use of the platform, as ultimate responsibility rests with the user.
                                        We are committed to providing valuable tools for informed decision-making but urge users to apply them judiciously within the broader context of their financial
                                        planning.</div>    
                            </div>

                        </div>
                      
                    </div>

                </div>

            <div id="particles-js"></div>
            
        </main>

    </div>

    <!-- Scripts -->
    <script src="../js/date.js"></script>
    <script src="../js/time.js"></script>
    <script src="../js/dark-mode.js"></script>
    <script src="../js/particles.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/mobile_nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
    <!-- <script src="../bootstrap/js/bootstrap.min.js"></script> -->
  
</body>
</html>