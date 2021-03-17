<!DOCTYPE html>
<?php
include_once '../header/headerblack/header.php';
include_once '../includes/dbh.php';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toll Payment</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
              <?php
              if(isset($_GET["error"]))
              {
                if($_GET["error"]=="mailsuccess")
                {
                 echo '<p id="error">Successfully Processed</p>';
                }
                else if($_GET["error"]=="noamount")
                  {
                   echo '<p id="error">Failed : No Balance</p>';
                  }


              }
              ?>

                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Toll Payment</h2>
                        <form  action="../includes/tollpayment.php" method="POST" >
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fastagid"  placeholder="FASTag ID"/>

                                <input type="hidden" name="tollusername" value="<?php echo $_SESSION['username']; ?>"  placeholder="FASTag ID"/>
                            </div>



                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Pay Toll"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.png" alt="sing up image"></figure>

                    </div>
                </div>
            </div>
        </section>



    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
