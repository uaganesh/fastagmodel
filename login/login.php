
<?php
include_once '../header/headerblack/header.php';
?>

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">



<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">

					<span class="login100-form-title p-b-55">
						Login
					</span>

				<form action="../includes/loginscript.php" method="post" class="login100-form validate-form">

					<div class="wrap-input100 validate-input m-b-16"">
						<input class="input100" type="text" name="username" placeholder="Username or Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>





					<div class="container-login100-form-btn p-t-25">
						<input type="submit" value="Login" name="submit" class="login100-form-btn"></br>
					</br>

						<?php
                                 if(isset($_GET["error"]))
       								{
      									 if($_GET["error"]=="emptyinput")
      									 {
       											 echo "<br><p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>Fill username and password!</p>";
      									 }
     								     else if($_GET["error"]=="wronglogin")
       									{
      											  echo "<br><p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>Username Doesn't Exist!</p>";
      									 }

      									 else if($_GET["error"]=="wrongloginpassword")
       									{
      											  echo "<br><p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>Incorrect Password!</p>";
      									 }
												 else if($_GET["error"]=="disabled")
       									{
      											  echo "<br><p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>Account is Blocked !</br>  Contact Support Team </p>";
      									 }





     								}

     					?>
							<?php
	                                 if(isset($_GET["newpwd"]))
	       								{
	      									 if($_GET["newpwd"]=="passwordupdated")
	      									 {
	       											 echo "<br><p style='color:red; text-align:center; font-size: 20px; font-weight:bold;'>Password Updated!</p>";
	      									 }

	     								}

	     					?>
					</div>

				</form>



					<div class="text-center w-full p-t-25">
						<span class="txt1">
							Forgot Password ?
						</span>

						<a class="txt1 bo1 hov1" href="../reset/reset.php">
							Reset Now
						</a>

				</div>

			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
