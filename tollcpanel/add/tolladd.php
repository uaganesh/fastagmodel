<!DOCTYPE html>
<?php

include_once '../../header/headerblack/header.php';

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Toll</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
			<div class="form-left">
				<h2>TOLL REGISTRATION</h2>
				<p class="text-1">Register new toll units via this panel .Make sure to enter the correct rates for the respective tag class as the amount given will be debited from the user's account</p>
        <h4>Tag Class</h4>
				<ul>
					<li>4 - mini Light Commercial Vehicle</li>
					<li>5 - Light Commercial vehicle 2-axle</li>
					<li>6 - Bus– 3 axle </li>
					<li>6a- Truck - 3 axle</li>
					<li>7 - Bus 2 axle / Mini bus, Truck 2 axle</li>
					<li>12- Tractor / Tractor with trailer</li>
					<li>15- Truck 7-axle and above</li>
					<li>16- Earth Moving / Heavy Construction Machinery</li>
				</ul>
			</div>
			<form class="form-detail" action="#" method="post" id="myform">
				<h2>REGISTER FORM</h2>
				<div class="form-group">
					<div class="form-row">
						<label for="username">Username for Toll</label>
						<input type="text" name="username" id="username" class="input-text" onBlur="checkAvailability()"><p id="user-availability-status"></p>
					</div>

				</div>
				<div class="form-row">
					<label for="your_email">Registered Name</label>
					<input type="text" name="name" id="your_email" class="input-text" required >
				</div>
				<div class="form-row">
					<label for="your_email">Email Issued</label>
					<input type="text" name="email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="comfirm-password">Confirm Password</label>
						<input type="password" name="confirmpassword" id="comfirm_password" class="input-text" required>
					</div>
				</div>

				<h4 color="red">Fee Details</h4>

				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="number">Tag Class 4</label>
						<input type="number" name="tag4"  class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="number">Tag Class 5</label>
						<input type="number" name="tag5"  class="input-text" required>
					</div>
				</div>

				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="number">Tag Class 6</label>
						<input type="number" name="tag6"  class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="number">Tag Class 6a</label>
						<input type="number" name="tag6a"  class="input-text" required>
					</div>
				</div>

				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="number">Tag Class 7</label>
						<input type="number" name="tag7"  class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="number">Tag Class 12</label>
						<input type="number" name="tag12"  class="input-text" required>
					</div>
				</div>

				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="number">Tag Class 15</label>
						<input type="number" name="tag15"  class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="number">Tag Class 16</label>
						<input type="number" name="tag16"  class="input-text" required>
					</div>
				</div>

				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register" >
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

	<script type="text/javascript">
function checkAvailability(){


	$.ajax({
		type:"POST",
		url:"test.php",
		cache:false,
		data:{
			type:1,
			username:$("#username").val(),
		},
		success:function(data){
			$("#user-availability-status").html(data);

		}
	});
}
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
