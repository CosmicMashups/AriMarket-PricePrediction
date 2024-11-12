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
                                    <div id="subtext-description">ARIMArket is built to predict the Philippine market prices of most of 
                                    your everyday ingredients in Metro Manila markets. These range from meat, fish, fruits and even vegetables--in
                                    ARIMArket, knowing the right time to buy has never been conveniently by your screen. </div>

                                <div id="how-do-i-use-arimarket">What does <span id="arima">ARIMA</span>rket do? </div>
                                    <div id="subtext-description">ARIMArket is built to predict the <span id = "ph">Philippine</span> market prices of most of your everyday ingredients
                                    in <span id="mm">Metro Manila</span> markets. These range from meat, fish, fruits and even vegetables--in ARIMArket, knowing the right time to 
                                    buy has never been conveniently by your screen. </div>
                                    
                                <div id="how-do-i-use-arimarket">What is <span id="arima">ARIMA</span>?</div>
                                    <div id="subtext-description">ARIMA (Autoregressive Integrated Moving Average) is a prediction model used for forecasting future trends 
                                    through existing time series data. This model predicts future trends with the use of previous data to create a technical analyses on the
                                    outcome of the model. </div>
                                    
                                <div id="how-do-i-use-arimarket">Is <span id="arima">ARIMA</span>rket accurate or reliable? </div>
                                    <div id="subtext-description">Although ARIMArket is able to forecast future prices of commodities through technical analysis, our team widely
                                    suggests that users remain vigilant and responsible towards their financial responsibilities. ARIMArket and its team cannot and will
                                    not be held responsible for any financial outcomes resulting from their use. </div>    
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