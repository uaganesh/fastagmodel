<?php
 session_start();
 ?>
 
 <!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FASTag Home</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">     
    <link rel="stylesheet" href="css/template-style.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>      
  </head>
  
  <body class="size-1140">
  	<!-- PREMIUM FEATURES BUTTON -->
  	<a target="_blank" class="hide-s" href="../template/eleganter-premium-responsive-business-template/" style="position:fixed;top:120px;right:-14px;z-index:10;"><img src="img/premium-features." alt=""></a>
    <!-- HEADER -->
    <header role="banner" class="position-absolute">    
      <!-- Top Navigation -->
      <nav class="background-transparent background-transparent-hightlight full-width sticky">
        <div class="s-12 l-2">
          <a href="index.php" class="logo">
            <!-- Logo White Version -->
            <img class="logo-white" src="img/logo.png" alt="">
            <!-- Logo Dark Version -->
            <img class="logo-dark" src="img/ab.png" alt="">


          </a>

        </div>
        <div class="top-nav s-12 l-10">
          <p class="nav-text"></p>
          <ul class="right chevron">
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">         </a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
         

            
            <ul class="right chevron">
      <?php
         if(!isset($_SESSION["useruid"]))
         {
          
          echo "<li><a href='../login/login.php'>Login</a></li>";
            echo "<li><a href='../registration/registration.php'>Sign up</a></li>";
            echo "<li><a href='../team/team.php'>Team</a></li>";
          
         }
         else if(isset($_SESSION['check']))
         {

          echo "<li><a href='../controlpanel/controlpanel.php'>CPanel</a></li>";
          echo "<li><a href='../includes/logout.php'>Logout</a></li>";
          echo "<li><a href='../profile/profile.php'>Profile</a></li>";

         }
         else
         { 

            

            echo "<li><a href='../dashboard/dashboard.php'>Dashboard</a></li>";
          echo "<li><a href='../profile/profile.php'>Profile</a></li>";
          echo "<li><a href='../includes/logout.php'>Logout</a></li>";
          echo '<li><a class="disabled">'.$_SESSION["useruid"].'</a></li>';

         }
        ?>
    </ul>
          </ul>
        </div>
      </nav>
    </header>
    
    <!-- MAIN -->
    <main role="main">    
      <!-- Main Header -->
      <header>
        <div class="carousel-default owl-carousel carousel-main carousel-nav-white background-dark text-center">
          <div class="item">
            <div class="s-12">
              <img src="img/header.jpg" alt="">
              <div class="carousel-content">
                <div class="content-center-vertical line">
                  <div class="margin-top-bottom-80">
                    <!-- Title -->
                    <h1 class="text-white margin-bottom-30 text-size-60 text-m-size-30 text-line-height-1">FASTag</h1>
                    <div class="s-12 m-10 l-8 center"><p class="text-white text-size-14 margin-bottom-40">FASTag is a simple to use, reloadable tag which enables automatic deduction of toll charges and lets you pass through the toll plaza without stopping for the cash transaction. </p></div>
                    <div class="line">
                      <div class="s-12 m-12 l-3 center">
                        <?php
         if(!isset($_SESSION["useruid"]))
         {
          echo "<a class='button button-white-stroke s-12' href='../registration/registration.php'>Get Your's Now</a>";
         
         }
         else if(isset($_SESSION['check']))
         { 

            echo "<a class='button button-white-stroke s-12' href='../controlpanel/controlpanel.php'>Control Panel</a>";
           

         }

         else
         {
          echo "<a class='button button-white-stroke s-12' href='../dashboard/dashboard.php'>Manage Your Dashboard</a>";

         }
        ?>
                        
                      </div>       
                    </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>              
        </div>               
      </header>
      
      <!-- Section 1 -->
      <section class="section-small-padding background-white text-center"> 
        <div class="line">
          <div class="margin">
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <div class="padding-2x block-bordered">
                <i class="icon-sli-shield icon3x text-dark center margin-bottom-30"></i>
                <h2 class="text-thin">Saves Fuel and Time</h2>
                <p class="margin-bottom-30"> The vehicle with FASTag doesn't need to stop at the toll plaza for the cash transaction . Thus saving your time</p>
                
              </div>
            </div>
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <div class="padding-2x block-bordered">
                <i class="icon-sli-umbrella icon3x text-dark center margin-bottom-30"></i>
                <h2 class="text-thin">Web</h2>
                <p class="margin-bottom-30">Web portal for customers. Customers can access their account by logging on the FASTag customer portal </p>
               
              </div>
            </div>
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <div class="padding-2x block-bordered">
                <i class="icon-sli-home icon3x text-dark center margin-bottom-30"></i>
                <h2 class="text-thin">Online recharge</h2>
                <p class="margin-bottom-30">Customer may recharge his tag account online through, Credit Card/ Debit Card and thus do faster payments.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Section 1 -->

      
      <!-- Section 2 -->
      <section class="full-width">
        <div class="s-12 m-12 l-6">  
          <img src="img/img-12.jpg" alt="">
        </div>
        <div class="s-12 m-12 l-6">
          <div class="padding-2x">
            <div class="line">
              <div class="float-left">
                <i class="icon-sli-drop icon3x text-dark"></i>
              </div>
              <div class="margin-left-60 margin-bottom-30">
                <h3 class="text-size-25 margin-bottom-0">Get your fastag now </h3>
                <p class="text-dark">why waiting ? Get your fastag by creating an account.</p>            
              </div>
            </div>
            
            <div class="line">
              <div class="float-left">
                <i class="icon-sli-screen-smartphone icon3x text-dark"></i>
              </div>
              <div class="margin-left-60 margin-bottom-30">
                <h3 class="text-size-25 margin-bottom-0">Responsive Website</h3>
                <p class="text-dark">Website is of fluid design enabling users to access service at ease..</p>            
              </div>
            </div>
            
            <div class="line">
              <div class="float-left">
                <i class="icon-sli-heart icon3x text-dark"></i>
              </div>
              <div class="margin-left-60 margin-bottom-30">
                <h3 class="text-size-25 margin-bottom-0">Customer Satisfaction</h3>
                <p>We ensure 100% sucess in fastag recharges with a userbase over 1 million</p>            
              </div>
            </div>
            
            <div class="line">
              <div class="float-left">
                <i class="icon-sli-chart icon3x text-dark"></i>
              </div>
              <div class="margin-left-60 margin-bottom-30">
                <h3 class="text-size-25 margin-bottom-0">Long validity</h3>
                <p>A FASTag account is valid for 5 years, after which the customer will need to renew his or her account. Thus, a long validity of 5 years makes FASTag a very convenient payment option..</p>            
              </div>
            </div>
            
            <div class="line">
              <div class="float-left">
                <i class="icon-sli-globe-alt icon3x text-dark"></i>
              </div>
              <div class="margin-left-60">
                <h3 class="text-size-25 margin-bottom-0">Better for environment</h3>
                <p class="text-dark">FASTag, like any initiative that avoids the use of paper, is very friendly for the environment. Absence of paper receipts will save paper which is better for our environment.</p>            
              </div>
            </div> 
          </div>
        </div>
      </section>
      
      <!-- Section 3 -->
      <section class="section background-white" >  
        <div class="line">
          <h2 class="text-size-50 text-center">Our Stats</h2>
          <hr class="break-small background-primary break-center">
          <div class="margin margin-top-bottom-50">
            <div class="s-12 m-12 l-3">
              <div class="block">
                <div class="count-to">
                  <span class="timer h1 text-size-50">1500</span>
                  <p class="h1 text-size-20 margin-top-10 text-dark text-thin">Centers</p> 
                </div>
              </div>
            </div>
            <div class="s-12 m-12 l-3">
              <div class="block">
                <div class="count-to">
                  <span class="timer h1 text-size-50">99%</span>
                  <p class="h1 text-size-20 margin-top-10 text-dark text-thin">Customer Satisfaction</p> 
                </div>
              </div>
            </div>
            <div class="s-12 m-12 l-3">
              <div class="block">
                <div class="count-to">
                  <span class="timer h1 text-size-50">287</span>
                  <p class="h1 text-size-20 margin-top-10 text-dark text-thin">Toll Booths</p> 
                </div>
              </div>
            </div>
            <div class="s-12 m-12 l-3">
              <div class="block">
                <div class="count-to">
                  <span class="timer h1 text-size-50">7 milion</span>
                  <p class="h1 text-size-20 margin-top-10 text-dark text-thin">FASTags Issued</p> 
                </div>
              </div>
            </div> 
          </div>
        </div>
      </section>
      
    
      
      <!-- Section 4 -->
      
      <!-- Section 5 -->    
      <section class="section background-white text-center">
        <div class="line">
          <h2 class="text-size-50 text-center">Testimonials</h2>
          <hr class="break-small background-primary break-center">
          <div class="carousel-default owl-carousel carousel-wide-arrows">
            <div class="item">
              <div class="s-12 m-12 l-7 center text-center">
                <img class="image-testimonial-small" src="img/testimonials-04.png" alt="">
                <p class="h1 margin-bottom text-size-20">"FASTag helped to maintain my speed of car and i can now reach the forest areas within time"</p>
                <p class="h1 text-size-16">Arun Baby/ Forest Officer / Kasargod Border</p>
              </div>
            </div>
            <div class="item"> 
              <div class="s-12 m-12 l-7 center text-center">
                <img class="image-testimonial-small" src="img/testimonials-05.png" alt="">
                <p class="h1 margin-bottom text-size-20">"Trivandrum to kannur ride in FZ is very challenging and without FASTag it will take hours to wait in toll plaza"</p>
                <p class="h1 text-size-16">Vyshnav K C  / Bonin predicter / Lakh House</h5>
              </div>
            </div>
            <div class="item">
              <div class="s-12 m-12 l-7 center text-center">
                <img class="image-testimonial-small" src="img/testimonials-06.png" alt="">
                <p class="h1 margin-bottom text-size-20">"me and kannappi definitely thought fastag will be a failure but it suprised us"</p>
                <p class="h1 text-size-16">Athul C P / Leader Lakh Colony / Kannur</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    
    <!-- FOOTER -->
    <footer>
      <!-- Contact Us -->
      <div class="background-primary padding text-center">
        <p class="h1">Contact Us: 1800 235 156 (7am - 7pm IST)</p>                                                                        
      </div>
      
      <!-- Main Footer -->
      <section class="background-dark full-width">
        <!-- Map -->
        <div class="s-12 m-12 l-6 margin-m-bottom-2x">
          <div class="s-12 grayscale center">  	  
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44639.4661157671!2d76.89695800659645!3d8.537319746600645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b05bbb805bbcd47%3A0x15439fab5c5c81cb!2sThiruvananthapuram%2C%20Kerala!5e0!3m2!1sen!2sin!4v1607740445175!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0"></iframe>
          </div>
        </div>
        
        <!-- Collumn 2 -->
        <div class="s-12 m-12 l-6 margin-m-bottom-2x">
          <div class="padding-2x">
            <div class="line">              
              <div class="float-left">
                  <i class="icon-sli-location-pin text-primary icon3x"></i>
                </div>
                <div class="margin-left-70 margin-bottom-30">
                  <h3 class="margin-bottom-0">Company Address</h3>
                  <p>Fastag Inc <br>
                     Trivandrum , Kerala 691001
                     
                  </p>               
                </div>
                <div class="float-left">
                  <i class="icon-sli-envelope text-primary icon3x"></i>
                </div>
                <div class="margin-left-70 margin-bottom-30">
                  <h3 class="margin-bottom-0">E-mail</h3>
                  <p>contact@fastag.com<br>
                    office@fastag.com
                  </p>              
                </div>
                <div class="float-left">
                  <i class="icon-sli-phone text-primary icon3x"></i>
                </div>
                <div class="margin-left-70">
                  <h3 class="margin-bottom-0">Phone Numbers</h3>
                  <p>+91 9852145874<br>
                     <br>
                     
                  </p>             
                </div>
            </div>
          </div>
        </div>  
      </section>
      <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 38, 51, 0.80);">
      
      <!-- Bottom Footer -->
      <section class="padding background-dark full-width">
        <div class="s-12 l-6">
          <p class="text-size-12">Copyright 2020, Arun Baby and Team </p>
          
        </div>
        
      </section>
    </footer>
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script>
  </body>
</html>