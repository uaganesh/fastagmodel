<!DOCTYPE html>
<html  >
<?php
include_once 'header.php';
include_once '../../includes/dbh.php';

?>

<?php
                 
                 $sql="SELECT applicationid FROM application WHERE username='{$_SESSION['username']}' and vehicleregisterno='{$_SESSION['regno']}' ";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {
                                

              ?>





<head>
  <!-- Site made with Mobirise Website Builder v5.2.0, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="hello/images/logo5.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Application Submitted</title>
  <link rel="stylesheet" href="hello/tether/tether.min.css">
  <link rel="stylesheet" href="hello/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="hello/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="hello/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="hello/theme/css/style.css">
  <link rel="preload" as="style" href="hello/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="hello/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
  
</head>
<body>
  
  <section class="header5 cid-sjp58jEoSP mbr-fullscreen" id="header5-w">

    

    

    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-lg-7">
                <?php echo '<h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1"><strong>'.'Application No : '.$row['applicationid'].'</strong></h1>'; ?>
                
                <p class="mbr-text mbr-fonts-style mbr-white display-7">Your Application is Submitted Successfully . Check the Manage Fastag page to know the status of your application and manage your fastag .</p>
                <div class="mbr-section-btn mt-3"><a class="btn btn-warning display-7" href="../../dashboard/dashboard.php">DASHBOARD</a></div>
            </div>
        </div>
    </div>

    <?php
         }

      }

?> 
</section><section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"></section><script src="hello/web/hello/jquery/jquery.min.js"></script>  <script src="hello/popper/popper.min.js"></script>  <script src="hello/tether/tether.min.js"></script>  <script src="hello/bootstrap/js/bootstrap.min.js"></script>  <script src="hello/smoothscroll/smooth-scroll.js"></script>  <script src="hello/theme/js/script.js"></script>  
  
  
</body>
</html>