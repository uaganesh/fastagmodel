<?php
 
 if(isset($_POST['submit']))
 {
    $regno= $_POST['regno'];
	$amount= $_POST['amount'];
	$fastag= $_POST['fastag'];


	require_once 'dbh.php';
	require_once 'functions.php';



rechargefastag($conn , $regno , $amount ,$fastag );

}

else
 {
 	header("location: ../login/login.php"); 
 	exit();
 }