<?php
// Start the session to access session variables
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | AriMarket</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/mobile_view.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">    
    <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> -->
</head>

<body>

    <?php
        // Check if there is a session message and type to display
        if (isset($_SESSION['dialog_message']) && isset($_SESSION['dialog_type'])) {
            $message = $_SESSION['dialog_message'];
            $dialog_type = $_SESSION['dialog_type'];

            // Clear the session variables after displaying the message
            unset($_SESSION['dialog_message']);
            unset($_SESSION['dialog_type']);
        ?>
        
        <!-- Dialog Box -->
        <div class="dialog-overlay" id="dialogOverlay" onclick="closeDialog()">
            <div class="dialog-box <?php echo $dialog_type; ?>" id="dialogBox" onclick="event.stopPropagation()">
                <!-- Show the positive or negative image based on dialog type -->
                <?php if ($dialog_type == 'positive') { ?>
                    <img src='../images/dialog/positive.png' alt="Positive Feedback">
                <?php } else { ?>
                    <img src='../images/dialog/negative.png' alt="Negative Feedback">
                <?php } ?>
                
                <h2>Thank You!</h2>
                <p><?php echo $message; ?></p>
                <button type='button' onclick='closeDialog()'>OK</button>
            </div>
        </div>
    
        <!-- JavaScript to trigger the dialog -->
        <script>
            var dialogType = "<?php echo $dialog_type; ?>";
            console.log("Dialog Type: <?php echo $dialog_type; ?>");

            document.addEventListener("DOMContentLoaded", function() {
                openDialog();
            });
        </script>
        
        <?php
        }
    ?> 
    
    <!-- CONTAINER -->
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
            
            <nav>
                <a href="home.php" class='active'><i class="fa-solid fa-square-poll-vertical" id="nav-icon"></i><span id='nav-link'>Dashboard</span></a>
                <a href="commodities.php" ><span id='nav-link'><i class="fa-solid fa-store"></i>&nbsp;&nbsp;&nbsp;&nbsp;Commodities</span></a>
                <a href="contacts.php" ><span id='nav-link'><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;Contact Us</span></a>
                <a href="about.php" ><span id='nav-link'><i class="fa-sharp fa-solid fa-circle-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;About</span></a>
            </nav>      

            <!-- Container: Why Use This App -->
            <div id='widget-nav'>
                <div id='widget-nav-content'>
                    <h2>Why Use This App?</h2>
                    <p>A price prediction system helps buyers make informed decisions by forecasting future commodity prices, allowing them to optimize their purchases and avoid overpaying in a fluctuating market.</p>
                </div>
            </div>
      
            <!-- Container: Dark Mode -->
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

        <!-- Main Content -->
        <main>
            
            <div id='content-container'>
                
                <!-- Contents: Left -->
                <div id='pseudo-nav'></div>

                <!-- Contents: Left -->
                <div id='content-left'>
                    
                    <!-- Left Widget 1: Date and Time -->
                    <div id='widget-row'>

                        <!-- Date -->
                        <div id='dashboard-left'>
                            <h1 style="padding-bottom: 3%; font-size: 35px;">Dashboard</h1>
                            <!-- Current Date & Time -->
                            <div class="date-time" id="date-time"></div>
                        </div>

                        <!-- Time -->
                        <div id='dashboard-right'>
                            <span id="time-container" style="padding-right: 7%; padding-top: 5px; font-size: smaller;">Today's time is</span>
                            <div id="time-container">
                                <h1><div id="time-display">00:00 AM</div></h1>
                            </div>
                        </div>

                    </div>

                    <!-- Left Widget 2: Price -->
                    <div id='widget-column'>
                        <h2><i class="fa-solid fa-coins">&nbsp;&nbsp;</i>Latest Prices</h2>
                        
                        <div id='gen-price-list'>
                            <!-- Price List -->
                            <ul class="price-list">

                                <li class="clickable-item">
                                    <div id='commodity-row'>     

                                        <div class="list-logo">
                                            <img src="../images/specific_commodity/well_milled_rice.png" alt="Rice Logo" class="commodity-logo">
                                        </div>
                                        <div class="commodity-name">Well-Milled Rice</div>
                                        <div class="commodity-price-home">₱63.00/kg</div>
                                        <div id='commodity-percentage' style="width:63%; background-color: #95afdd; z-index: -1;"></div>
                                        
                                    </div>
                                </li>
                                                                
                                <li class="clickable-item">
                                    <div id='commodity-row'>     

                                        <div class="list-logo">
                                            <img src="../images/specific_commodity/tomato.png" alt="Vege Logo" class="commodity-logo">
                                        </div>
                                        <div class="commodity-name">Tomato</div>
                                        <div class="commodity-price-home">₱53.00/kg</div>
                                        <div id='commodity-percentage' style="width:53%; background-color: #95afdd; z-index: -1;"></div>
                                        
                                    </div>
                                </li>
                                                                
                                <li class="clickable-item">
                                    <div id='commodity-row'>     

                                        <div class="list-logo">
                                            <img src="../images/specific_commodity/beef_brisket.png" alt="Meat Logo" class="commodity-logo">
                                        </div>
                                        <div class="commodity-name">Beef Brisket</div>
                                        <div class="commodity-price-home">₱288.00/kg</div>
                                        <div id='commodity-percentage' style="width:88%; background-color: #95afdd; z-index: -1;"></div>
                                        
                                    </div>
                                </li>
                                                                
                                <li class="clickable-item">
                                    <div id='commodity-row'>     

                                        <div class="list-logo">
                                            <img src="../images/specific_commodity/bangus.png" alt="Fish Logo" class="commodity-logo">
                                        </div>
                                        <div class="commodity-name">Bangus</div>
                                        <div class="commodity-price-home">₱186.00/kg</div>
                                        <div id='commodity-percentage' style="width:74%; background-color: #95afdd; z-index: -1;"></div>
                                        
                                    </div>
                                </li>
                                                                
                                <li class="clickable-item">
                                    <div id='commodity-row'>     

                                        <div class="list-logo">
                                            <img src="../images/specific_commodity/papaya.png" alt="Fruit Logo" class="commodity-logo">
                                        </div>
                                        <div class="commodity-name">Papaya</div>
                                        <div class="commodity-price-home">₱56.00/kg</div>
                                        <div id='commodity-percentage' style="width:56%; background-color: #95afdd; z-index: -1;"></div>
                                        
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>

                <!-- Contents: Right -->
                <div id='content-right'>

                    <!-- Right Widget 1: GDP -->
                    <div id='widget-column'>
                        <div class='widget-label'>
                            <h2>Gross Domestic Product</h2>
                        </div>

                        <div class="chart">
                            <canvas id="GDPChart" width="350" height="200"></canvas>
                        </div>
                    </div>

                    <!-- Commodity Buttons -->
                    <div id='widget-column'>
                        <div class='widget-label'>
                            <h2>Prices</h2>

                            <div id='commodity-buttons'>
                                <a href='commodity/beef_brisket.php'>
                                    <div class='commodity-button'>
                                        <div class="commodity-button-icon"><img src="../images/logo/meat-logo.png" alt="Rice Logo" class="commodity-button-icon-img"></div>
                                        <div class="commodity-button-label">MEAT</div>
                                    </div>
                                </a>
                
                                <a href='commodity/alumahan.php'>
                                    <div class='commodity-button'>
                                        <div class="commodity-button-icon"><img src="../images/logo/fish-logo.png" alt="Rice Logo" class="commodity-button-icon-img"></div>
                                        <div class="commodity-button-label">FISH</div>
                                    </div>
                                </a>
                
                                <a href='commodity/regular_milled_rice.php'>
                                    <div class='commodity-button'>
                                        <div class="commodity-button-icon"><img src="../images/logo/rice-logo.png" alt="Rice Logo" class="commodity-button-icon-img"></div>
                                        <div class="commodity-button-label">RICE</div>
                                    </div>
                                </a>
                
                                <a href='commodity/banana_lakatan.php'>                    
                                    <div class='commodity-button'>
                                        <div class="commodity-button-icon"><img src="../images/logo/fruit-logo.png" alt="Rice Logo" class="commodity-button-icon-img"></div>
                                        <div class="commodity-button-label">FRUITS</div>
                                    </div>
                                </a>
                
                                <a href='commodity/cabbage.php'>                       
                                    <div class='commodity-button'>
                                        <div class="commodity-button-icon"><img src="../images/logo/vegetable-logo.png" alt="Rice Logo" class="commodity-button-icon-img"></div>
                                        <div class="commodity-button-label">VEGETABLES</div>
                                    </div>
                                </a>
                
                                <a href='commodity/garlic.php'>                       
                                    <div class='commodity-button'>
                                        <div class="commodity-button-icon"><img src="../images/logo/spices-logo.png" alt="Spices Logo" class="commodity-button-icon-img"></div>
                                        <div class="commodity-button-label">SPICES</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                    </div>    

                    <div id="particles-js"></div>

                </div>

            </div>
               
        </main>  

    </div>
    

<!-- Scripts -->
<script src="../js/date.js"></script>
<script src="../js/time.js"></script>
<script src="../js/dark-mode.js"></script>
<script src="../js/graph/gdp.js"></script>
<script src="../js/mobile_nav.js"></script>
<script src="../js/new_dialog.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="../js/particles.js"></script>
<script src="../js/app.js"></script>

</body>
</html>