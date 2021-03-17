<!DOCTYPE html>
<?php
include_once '../header/headerblack/header.php';
include_once '../includes/dbh.php';
?>



 <?php
if(!isset($_SESSION['loggedin'])){ //if login in session is not set

    header("Location:../login/login.php");
}
?>

<!--Fetches the status value from database by checking the session logged in user name and payment equals to pending -->



<?php

                 $sql="SELECT IFNULL((SELECT status FROM application where username='{$_SESSION['username']}' and payment='PENDING'),'null') AS status;";
                // $sql="SELECT status FROM registration WHERE username='{$_SESSION['username']}'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {

                             $status=$row['status'];
              ?>


<!--Fetches the applicationstatus value from database by checking the session logged in user name and applicationstatus equals to pending to prevent user from applying form if an application is in pending status-->

              <?php

                 $sql="SELECT IFNULL((SELECT applicationstatus FROM application where username='{$_SESSION['username']}' and applicationstatus='PENDING'),'null') AS applicationstatus;";
                // $sql="SELECT status FROM registration WHERE username='{$_SESSION['username']}'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {

                             $applicationstatus=$row['applicationstatus'];
              ?>


<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.2.0, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="custom/images/logo5.png" type="image/x-icon">
  <meta name="description" content="">


  <title>Dashboard</title>
  <link rel="stylesheet" href="custom/tether/tether.min.css">
  <link rel="stylesheet" href="custom/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="custom/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="custom/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="custom/socicon/css/styles.css">
  <link rel="stylesheet" href="custom/theme/css/style.css">
  <link rel="preload" as="style" href="custom/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="custom/mobirise/css/mbr-additional.css" type="text/css">




</head>
<body>

  <section class="content2 cid-siVbNIEK0o" id="content2-p">


    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Dashboard</strong></h4>
            <h5 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-5">ALL IN ONE ABOUT FASTag<br><br></h5>
        </div>
        <div class="row mt-4">
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="custom/images/fastag-nov-nov-600x450.jpg" alt="" title="">
                    </div>

                      <div class="item-content">

 <!-- Checking if application is in pending state -->

                      <?php
                        if($applicationstatus=='PENDING')
                        {

                              echo '<h5 class="item-title mbr-fonts-style display-5">Pending</h5>';

                                   echo '<p class="mbr-text mbr-fonts-style mt-3 display-7">Your previous application for FASTag is pending. You cannot apply for another FASTag until the previous application is approved or rejected.<br></p>';


                        }

                      else
                      {




                              if($status==='null'||$status=='0')
                              {
                                   echo '<h5 class="item-title mbr-fonts-style display-5">Apply For FASTag</h5>';

                                   echo '<p class="mbr-text mbr-fonts-style mt-3 display-7">Get FASTag for your vehicle by applying the form under 10 minutes .&nbsp;FASTag has been made mandatory for four-wheelers from January 1, 2021.<br></p>';



                              }

                              else if($status==='1')
                              {

                                echo '<h5 class="item-title mbr-fonts-style display-5">Complete Your Payment</h5>';

                                  echo '<p class="mbr-text mbr-fonts-style mt-3 display-7">You Have an Open Application left to complete . Please complete the Application by Completing the payment<br></p>';

                              }
                       }



                            ?>

                            </div>








                    <div class="mbr-section-btn item-footer mt-2">
                     <?php


                        if($applicationstatus=='PENDING')
                        {


                             echo '<a href="" class="btn item-btn btn-primary display-7" >APPLICATION PENDING</a>';

                        }
                        else
                        {
                              if($status==='null'||$status=='0')
                              {

                              echo '<a href="../application/intro/intro.php" class="btn item-btn btn-primary display-7" >APPLY</a>';
                              }

                              else if($status==='1')
                              {

                              echo '<a href="../application/payment/checkout/payment.php" class="btn item-btn btn-primary display-7" >RESUME APPLICATION</a>';

                              }
                        }



                      ?>

<?php

}
}
?>
              <?php
         }

      }

?>
                    </div>
                </div>
            </div>
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="custom/images/unnamed-300x300.png" alt="" title="">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5">Manage&nbsp;</h5>

                        <p class="mbr-text mbr-fonts-style mt-3 display-7">You can manage your FASTag
<br>id in this portal. You can see status
,recharge the FASTag and know details of the registered FASTag id.<br>
                        </p>
                    </div>
                    <div class="mbr-section-btn item-footer mt-2"><a href="../includes/check.php" class="btn btn-primary item-btn display-7" >MANAGE</a></div>
                </div>
            </div>
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="custom/images/account-card-512-512x512.png" alt="" title="">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5">Account Details</h5>

                        <p class="mbr-text mbr-fonts-style mt-3 display-7">View your Account Details of your Fastag Accout.To update details mail your request with proper proof to support@fastag.com from&nbsp;<br>your registered email address</p>
                    </div>
                    <div class="mbr-section-btn item-footer mt-2"><a href="../profile/profile.php" class="btn btn-primary item-btn display-7" >ACCOUNT DETAILS</a></div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="footer3 cid-s48P1Icc8J" once="footers" id="footer3-n">





    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">





                <li class="foot-menu-item mbr-fonts-style display-7"></li><li class="foot-menu-item mbr-fonts-style display-7"></li><li class="foot-menu-item mbr-fonts-style display-7"></li></ul>
            </div>

            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2020. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/y" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a><p style="flex: 0 0 auto; margin:0; padding-right:1rem;"> <a href="https://mobirise.site/w" style="color:#aaa;"></a></p></section><script src="custom/web/custom/jquery/jquery.min.js"></script>  <script src="custom/popper/popper.min.js"></script>  <script src="custom/tether/tether.min.js"></script>  <script src="custom/bootstrap/js/bootstrap.min.js"></script>  <script src="custom/smoothscroll/smooth-scroll.js"></script>  <script src="custom/theme/js/script.js"></script>


</body>
</html>
