<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | AriMarket</title>
    <link rel="stylesheet" href="../css/contacts.css">
    <link rel="stylesheet" href="../css/contacts_mobile.css">
    <link rel="stylesheet" href="../css/mobile_view.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">    
    <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> -->

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
              <a href="commodities.php"><span id='nav-link'><i class="fa-solid fa-store"></i>&nbsp;&nbsp;&nbsp;&nbsp;Commodities</span></a>
              <a class='active'><span id='nav-link'><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;Contact Us</span></a>
              <a href="about.php"><span id='nav-link'><i class="fa-sharp fa-solid fa-circle-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;About</span></a>
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

          <div id='content-single-container'>

                <!-- Pseudo Nav Pane -->
                <div id='pseudo-nav'></div>
                
                <!-- Container: Contents -->    
                <div id='content-center-container'>
                    <!-- Left Widget 1: Date and Time -->
                    <div id='widget-single-column' >

                        <!-- Date -->
                        <div class="center-container">
                            <div id="dashboard-left">
                                <div id="about-header">
                                    <div id="about-header-icon">
                                        <h1><i class="fa-solid fa-people-arrows"></i></h1>
                                    </div>

                                    <div id="about-header-label">
                                        <h1>Contact Us</h1>
                                    </div>
                                </div>

                                <div id="comment-box">
                                    <form action="../php/connect.php" method="post">
                                        <div class="about_input">
                                            <div class="about_input_icon_label">
                                                <div class="about_input_icon">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                                <label for="name" class="about_input_label">Name:</label> <!-- Changed div to label -->
                                            </div>
                                            <div class="about_input_box">
                                                <input type="text" id="name" name="name" placeholder="Name (optional)" />
                                            </div>
                                        </div>
                                        
                                        <div class="about_input">
                                            <div class="about_input_icon_label">
                                                <div class="about_input_icon">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </div>
                                                <label for="email" class="about_input_label">E-mail:</label> <!-- Changed div to label -->
                                            </div>
                                            <div class="about_input_box">
                                                <input type="email" id="email" name="email" placeholder="E-mail Address*" required /> <!-- Changed type to email -->
                                            </div>
                                        </div>
                                        
                                        <div class="about_input_large">
                                            <div class="about_input_large_icon_label">
                                                <div class="about_input_icon">
                                                    <i class="fa-solid fa-message"></i>
                                                </div>
                                                <label for="concern" class="about_input_label">Message:</label> <!-- Changed div to label -->
                                            </div>
                                            <div class="about_input_large_box">
                                                <textarea class="custom-textarea" id="concern" name="concern" placeholder="Share your concerns ..." required></textarea> <!-- Added required attribute -->
                                            </div>
                                        </div>
                                        
                                        <div id="about-button-container">
                                            <button type="submit" id="send-button"> <!-- Changed input to button for better semantics -->
                                                <i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Send
                                            </button>
                                        </div>
                                    </form>

                                </div>
                                                               
                            </div>

                        </div>            

                    </div>     
                              
                    <div id="particles-js"></div>

                </div>        
            
        </main>

    </div>    

<!-- Scripts -->
<script src="../js/date.js"></script>
<script src="../js/time.js"></script>
<script src="../js/dark-mode.js"></script>
<script src="../js/fetch_data.js"></script>
<script src="../js/graph/gdp.js"></script>
<script src="../js/mobile_nav.js"></script>
<script src="../js/concerns.js"></script>
<script src="../js/dialog_box.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../js/particles.js"></script>
<script src="../js/app.js"></script>

</body>
</html>

<!-- Search Bar
<div class="search-bar">
    <div class="search-bar">
        <i class="fas fa-search search-icon"></i><input type="text" id="search-input" placeholder="Would you like to search something...">
        <ul id="search-suggestions"></ul>
    </div>
</div> -->