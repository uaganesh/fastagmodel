<?php
 session_start();
 ?>


<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1"

	<link rel="stylesheet" href="cssd/demo.css">
	<link rel="stylesheet" href="cssd/header-login-signup.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

</head>

<body>

<header class="header-login-signup">

	<div class="header-limiter">

		<h1><a >FAS<span>Tag</span></a></h1>

		<nav>
			<a href="../../index/index.php">Home</a>
			
			
	    </nav>
         
        <ul>
	    <?php
	       if(isset($_SESSION["useruid"]))
	       {
	       	echo "<li><a href='../profile/profile.php'>Profile</a></li>";
			echo "<li><a href='../includes/logout.php'>Logout</a></li>";
	       }
	       else
	       { 

            echo "<li><a href='../login/login.php'>Login</a></li>";
			echo "<li><a href='../registration/registration.php'>Sign up</a></li>";

	       }
	      ?>
	  </ul>


	</div>

</header>

<!-- The content of your page would go here. -->

		
