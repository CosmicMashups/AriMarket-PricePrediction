<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commodities | AriMarket</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/mobile_view.css">
    <link rel="stylesheet" href="../css/commodities_mobile.css">
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
          <a class='active'><span id='nav-link'><i class="fa-solid fa-store"></i>&nbsp;&nbsp;&nbsp;&nbsp;Commodities</span></a>
          <a href="contacts.php"><span id='nav-link'><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;Contact Us</span></a>
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

    <main>
      <div id='content-single-container'>
                
        <!-- Contents: Left -->
        <div id='pseudo-nav'>

        </div>

        <!-- Price -->
        <div id='widget-single-column'>
          <h1 style="margin-left: 15px;"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;List of Commodities</h1>
          <!-- Content: Main Price List -->
          <div id='main-price-list'>
              <!-- Price List -->
              <ul class="collapsible-list">
                
                 <!-- Meat -->
                <li class="clickable-item collapsible">
                  <div class="collapsible-header" id='main-commodity-row'>    
                      <div class="list-logo">
                          <img src="../images/logo/meat-logo.png" alt="Meat Logo" class="commodity-logo">
                      </div>
                      <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Meat</div>
                      <div class="dot-leaders"></div>
                      <div class="commodity-price">Click to expand...</div>    
                      <!-- <div class="commodity-percentage"></div>                        -->
                  </div>
              
                  <ul class="collapsible-content">
                      <a href="commodity/beef_brisket.php">
                        <li class="collapsible-item" id='main-commodity-row-specific'>
                          <div class="list-logo">
                            <img src="../images/specific_commodity/beef_brisket.png" alt="Meat Logo" class="commodity-logo">
                          </div>
                          <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Beef Brisket</div>
                          <div class="dot-leaders"></div>
                          <div class="commodity-price">Check price?</div>    
                        </li>
                      </a>

                      <a href="commodity/beef_rump.php">
                        <li class="collapsible-item" id='main-commodity-row-specific'>
                          <div class="list-logo">
                            <img src="../images/specific_commodity/beef_rump.png" alt="Meat Logo" class="commodity-logo">
                          </div>
                          <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Beef Rump</div>
                          <div class="dot-leaders"></div>                        
                          <div class="commodity-price">Check price?</div>
                        </li>
                      </a>

                      <a href="commodity/whole_chicken.php">
                        <li class="collapsible-item" id='main-commodity-row-specific'>
                          <div class="list-logo">
                            <img src="../images/specific_commodity/whole_chicken.png" alt="Meat Logo" class="commodity-logo">
                          </div>
                          <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Whole Chicken</div>
                          <div class="dot-leaders"></div>  
                          <div class="commodity-price">Check price?</div>
                        </li>
                      </a>

                      <a href="commodity/pork_belly.php">
                        <li class="collapsible-item" id='main-commodity-row-specific'>
                          <div class="list-logo">
                            <img src="../images/specific_commodity/pork_belly.png" alt="Meat Logo" class="commodity-logo">
                          </div>
                          <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Pork Belly</div>
                          <div class="dot-leaders"></div>  
                          <div class="commodity-price">Check price?</div>
                        </li>
                      </a>

                      <a href="commodity/pork_ham.php">
                        <li class="collapsible-item" id='main-commodity-row-specific'>
                          <div class="list-logo">
                            <img src="../images/specific_commodity/pork_kasim.png" alt="Meat Logo" class="commodity-logo">
                          </div>
                          <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Pork Ham</div>
                          <div class="dot-leaders"></div>  
                          <div class="commodity-price">Check price?</div>
                        </li>
                      </a>
                    </ul>                         
                </li>
                
                <!-- Fish -->
               <li class="clickable-item collapsible">
                 <div class="collapsible-header" id='main-commodity-row'>    
                     <div class="list-logo">
                         <img src="../images/logo/fish-logo.png" alt="Fish Logo" class="commodity-logo">
                     </div>
                     <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Fish</div>
                     <div class="dot-leaders"></div>
                     <div class="commodity-price">Click to expand...</div>    
                 </div>
             
                 <ul class="collapsible-content">
                      <a href="commodity/alumahan.php">
                        <li class="collapsible-item" id='main-commodity-row-specific'>
                          <div class="list-logo">
                            <img src="../images/specific_commodity/alumahan.png" alt="Meat Logo" class="commodity-logo">
                          </div>
                          <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Alumahan</div>
                          <div class="dot-leaders"></div>
                          <div class="commodity-price">Check price?</div>
                        </li>
                      </a>

                      <a href="commodity/bangus.php">
                        <li class="collapsible-item" id='main-commodity-row-specific'>
                          <div class="list-logo">
                            <img src="../images/specific_commodity/bangus.png" alt="Meat Logo" class="commodity-logo">
                          </div>
                          <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Bangus</div>
                          <div class="dot-leaders"></div>                        
                          <div class="commodity-price">Check price?</div>
                        </li>
                      </a>

                      <a href="commodity/galunggong.php">
                        <li class="collapsible-item" id='main-commodity-row-specific'>
                          <div class="list-logo">
                            <img src="../images/specific_commodity/galunggong.png" alt="Meat Logo" class="commodity-logo">
                          </div>
                          <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Galunggong</div>
                          <div class="dot-leaders"></div>  
                          <div class="commodity-price">Check price?</div>
                        </li>
                      </a>

                      <a href="commodity/tilapia.php">
                        <li class="collapsible-item" id='main-commodity-row-specific'>
                          <div class="list-logo">
                            <img src="../images/specific_commodity/tilapia.png" alt="Meat Logo" class="commodity-logo">
                          </div>
                          <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Tilapia</div>
                          <div class="dot-leaders"></div>  
                          <div class="commodity-price">Check price?</div>
                        </li>
                      </a>
                   </ul>                         
               </li>
                
               <!-- Rice -->
              <li class="clickable-item collapsible">
                <div class="collapsible-header" id='main-commodity-row'>    
                    <div class="list-logo">
                        <img src="../images/logo/rice-logo.png" alt="Rice Logo" class="commodity-logo">
                    </div>
                    <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Rice</div>
                    <div class="dot-leaders"></div>
                    <div class="commodity-price">Click to expand...</div>    
                </div>
            
                <ul class="collapsible-content">
                    <a href="commodity/regular_milled_rice.php">
                      <li class="collapsible-item" id='main-commodity-row-specific'>
                        <div class="list-logo">
                          <img src="../images/specific_commodity/regular_milled_rice.png" alt="Rice Logo" class="commodity-logo">
                        </div>
                        <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Regular-Milled Rice</div>
                        <div class="dot-leaders"></div>
                        <div class="commodity-price">Check price?</div>
                      </li>
                    </a>

                    <a href="commodity/well_milled_rice.php">
                      <li class="collapsible-item" id='main-commodity-row-specific'>
                        <div class="list-logo">
                          <img src="../images/specific_commodity/well_milled_rice.png" alt="Rice Logo" class="commodity-logo">
                        </div>
                        <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Well-Milled Rice</div>
                        <div class="dot-leaders"></div>                        
                        <div class="commodity-price">Check price?</div>
                      </li>
                    </a>

                    <a href="commodity/premium_rice.php">
                      <li class="collapsible-item" id='main-commodity-row-specific'>
                        <div class="list-logo">
                          <img src="../images/specific_commodity/premium_rice.png" alt="Rice Logo" class="commodity-logo">
                        </div>
                        <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Premium Rice</div>
                        <div class="dot-leaders"></div>  
                        <div class="commodity-price">Check price?</div>
                      </li>
                    </a>

                    <a href="commodity/special_rice.php">
                      <li class="collapsible-item" id='main-commodity-row-specific'>
                        <div class="list-logo">
                          <img src="../images/specific_commodity/special_rice.png" alt="Rice Logo" class="commodity-logo">
                        </div>
                        <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Special Rice</div>
                        <div class="dot-leaders"></div>  
                        <div class="commodity-price">Check price?</div>
                      </li>
                    </a>
                  </ul>                         
              </li>
                
              <!-- Fruits -->
             <li class="clickable-item collapsible">
               <div class="collapsible-header" id='main-commodity-row'>    
                   <div class="list-logo">
                       <img src="../images/logo/fruit-logo.png" alt="Fruits Logo" class="commodity-logo">
                   </div>
                   <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Fruits</div>
                   <div class="dot-leaders"></div>
                   <div class="commodity-price">Click to expand...</div>    
               </div>
           
               <ul class="collapsible-content">
                    <a href="commodity/banana_lakatan.php">
                      <li class="collapsible-item" id='main-commodity-row-specific'>
                        <div class="list-logo">
                          <img src="../images/specific_commodity/banana_lakatan.png" alt="Banana Logo" class="commodity-logo">
                        </div>
                        <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Banana (Lakatan)</div>
                        <div class="dot-leaders"></div>
                        <div class="commodity-price">Check price?</div>
                      </li>
                    </a>

                    <a href="commodity/calamansi.php">
                      <li class="collapsible-item" id='main-commodity-row-specific'>
                        <div class="list-logo">
                          <img src="../images/specific_commodity/calamansi.png" alt="Calamansi Logo" class="commodity-logo">
                        </div>
                        <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Calamansi</div>
                        <div class="dot-leaders"></div>                     
                        <div class="commodity-price">Check price?</div>   
                      </li>
                    </a>

                    <a href="commodity/mango.php">
                      <li class="collapsible-item" id='main-commodity-row-specific'>
                        <div class="list-logo">
                          <img src="../images/specific_commodity/mango.png" alt="Mango Logo" class="commodity-logo">
                        </div>
                        <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Mango</div>
                        <div class="dot-leaders"></div>  
                        <div class="commodity-price">Check price?</div>
                      </li>
                    </a>

                    <a href="commodity/papaya.php">
                      <li class="collapsible-item" id='main-commodity-row-specific'>
                        <div class="list-logo">
                          <img src="../images/specific_commodity/papaya.png" alt="Papaya Logo" class="commodity-logo">
                        </div>
                        <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Papaya</div>
                        <div class="dot-leaders"></div>  
                        <div class="commodity-price">Check price?</div>
                      </li>
                    </a>
                 </ul>                         
             </li>
                
             <!-- Vegetables -->
            <li class="clickable-item collapsible">
              <div class="collapsible-header" id='main-commodity-row'>    
                  <div class="list-logo">
                      <img src="../images/logo/vegetable-logo.png" alt="Vegetables Logo" class="commodity-logo">
                  </div>
                  <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Vegetables</div>
                  <div class="dot-leaders"></div>
                  <div class="commodity-price">Click to expand...</div>    
              </div>
          
              <ul class="collapsible-content">
                  <a href="commodity/cabbage.php">
                    <li class="collapsible-item" id='main-commodity-row-specific'>
                      <div class="list-logo">
                        <img src="../images/specific_commodity/cabbage.png" alt="Cabbage Logo" class="commodity-logo">
                      </div>
                      <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Cabbage</div>
                      <div class="dot-leaders"></div>
                      <div class="commodity-price">Check price?</div>
                    </li>
                  </a>

                  <a href="commodity/carrots.php">
                    <li class="collapsible-item" id='main-commodity-row-specific'>
                      <div class="list-logo">
                        <img src="../images/specific_commodity/carrots.png" alt="Carrots Logo" class="commodity-logo">
                      </div>
                      <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Carrots</div>
                      <div class="dot-leaders"></div>                   
                      <div class="commodity-price">Check price?</div>     
                    </li>
                  </a>

                  <a href="commodity/eggplant.php">
                    <li class="collapsible-item" id='main-commodity-row-specific'>
                      <div class="list-logo">
                        <img src="../images/specific_commodity/eggplant.png" alt="Eggplant Logo" class="commodity-logo">
                      </div>
                      <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Eggplant</div>
                      <div class="dot-leaders"></div>  
                      <div class="commodity-price">Check price?</div>
                    </li>
                  </a>

                  <a href="commodity/tomato.php">
                    <li class="collapsible-item" id='main-commodity-row-specific'>
                      <div class="list-logo">
                        <img src="../images/specific_commodity/tomato.png" alt="Tomato Logo" class="commodity-logo">
                      </div>
                      <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Tomato</div>
                      <div class="dot-leaders"></div>  
                      <div class="commodity-price">Check price?</div>
                    </li>
                  </a>

                  <a href="commodity/potato.php">
                    <li class="collapsible-item" id='main-commodity-row-specific'>
                      <div class="list-logo">
                        <img src="../images/specific_commodity/potato.png" alt="Potato Logo" class="commodity-logo">
                      </div>
                      <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Potato</div>
                      <div class="dot-leaders"></div>  
                      <div class="commodity-price">Check price?</div>
                    </li>
                  </a>
                </ul>                         
              </li>

              <li class="clickable-item collapsible">
                <div class="collapsible-header" id='main-commodity-row'>    
                    <div class="list-logo">
                        <img src="../images/logo/spices-logo.png" alt="Spices Logo" class="commodity-logo">
                    </div>
                    <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Spices</div>
                    <div class="dot-leaders"></div>
                    <div class="commodity-price">Click to expand...</div>    
                </div>
           
                <ul class="collapsible-content">
                    <a href="commodity/garlic.php">
                      <li class="collapsible-item" id='main-commodity-row-specific'>
                        <div class="list-logo">
                          <img src="../images/specific_commodity/garlic.png" alt="Garlic Logo" class="commodity-logo">
                        </div>
                        <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Garlic</div>
                        <div class="dot-leaders"></div>
                        <div class="commodity-price">Check price?</div>
                      </li>
                    </a>

                    <a href="commodity/onion.php">
                      <li class="collapsible-item" id='main-commodity-row-specific'>
                        <div class="list-logo">
                          <img src="../images/specific_commodity/red_onion.png" alt="Onion Logo" class="commodity-logo">
                        </div>
                        <div class="commodity-name">&nbsp;&nbsp;&nbsp;&nbsp;Onion</div>
                        <div class="dot-leaders"></div>  
                        <div class="commodity-price">Check price?</div>
                      </li>
                    </a>
                </ul>                         
             </li>

            </ul>
          </div>

      </div>

      <div id="particles-js"></div>
        
    </main>
  </div>

  <!-- Scripts -->
  <script src="../js/date.js"></script>
  <script src="../js/time.js"></script>
  <script src="../js/dark-mode.js"></script>
  <script src="../js/fetch_data.js"></script>
  <script src="../js/graph/gdp.js"></script>
  <script src="../js/collapsible-list.js"></script>
  <script src="../js/mobile_nav.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="../js/particles.js"></script>
  <script src="../js/app.js"></script>
  <!-- <script src="../bootstrap/js/bootstrap.min.js"></script> -->
  
</body>
</html>