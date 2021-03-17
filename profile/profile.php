<!DOCTYPE html>
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
<html lang="en">
<head>
	<title>Profile Details</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
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


	<div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Registered Account Details 
				</span>

				<?php
                 
                 $sql="SELECT * FROM registration WHERE username='{$_SESSION['username']}'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {
                                

              ?>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">Registered Name *</span>
					<input class="input100" type="text" name="name" value="<?php echo $row['name']; ?>" readonly>
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" >
					<span class="label-input100">Registered Email*</span>
					<input class="input100" type="text" name="email" value="<?php echo $row['email']; ?>" readonly>
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Registered Username </span>
					<input class="input100" type="text" name="web" value="<?php echo $row['username']; ?>" readonly>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100"></span>
					
				</div>

	<?php
         }

      }

?> 

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<a  href="../dashboard/dashboard.php" class="contact100-form-btn">
							TAKE ME TO THE DASHBOARD
						</a>
					</div>
				</div>
			</form>
		</div>

		<span class="contact100-more">
			For any issues Call us on 1800 235 156 </br>
				To change password logout and click on forgot password .
				For any other updations mail a request with attached proof to support@fastag.com
		</span>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
