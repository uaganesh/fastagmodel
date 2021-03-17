
<?php
include_once '../header/headerblack/header.php';?>

<?php
if(isset($_GET["error"]))
{
       if($_GET["error"]=="none")
       {

        header("Refresh:5; url=../login/login.php");

       }
}

?>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <style>
     .new{

        font-family: "Open Sans", "Arial", "Helvetica Neue", sans-serif;
        font-weight: 400;
        font-size: 16px;
        color:red;

     }

</style>
    <!-- Title Page-->
    <title>Reset Password</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Reset your Password</h2>
                </div>
                <div class="card-body">
                  <?php
                      $selector=$_GET["selector"];
                      $validator=$_GET["validator"];

                      if (empty($selector)||empty($validator)) {

                        echo "Could not validate your request";

                      }

                      else{
                      if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                        //?>

                         <form action="../includes/creatingpassword.php" method="POST">

                           <input type="hidden" name="selector" value="<?php echo $selector ?>">
                           <input type="hidden" name="validator" value="<?php echo $validator ?>">

                           <div class="form-row m-b-55">

                           <div class="form-row">
                               <div class="name">Password</div>
                               <div class="value">
                                   <div class="input-group">
                                       <input class="input--style-5" type="password" name="password" placeholder="Enter Password">
                                   </div>
                               </div>
                            </div>

                             </br></br>

                             <div class="form-row">
                                 <div class="name">Confirm Password</div>
                                 <div class="value">
                                     <div class="input-group">
                                         <input class="input--style-5" type="password" name="confirmpassword" placeholder="Confirm Password">
                                     </div>
                                 </div>
                              </div>



                              <div class="form-row">
                                  <div class="name"></div>
                                  <div class="value">
                                      <div class="input-group">
                                   <input class="btn btn--radius-2 btn--green"  type="submit" name="reset-password-submit" value="Reset Password"></br>
                               </div>




                        <?php
                      }

                      }


                  ?>






                </div>
            </div>
        </div>
    </div>



    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


</html>
<!-- end document-->
