<?php

 if(!isset($_SESSION['loggedin']))
 {
    $name= $_POST['name'];
    $email= $_POST['email'];
	$gender= $_POST['gender'];
	$address=$_POST['address'];
	$contact= $_POST['contact'];
	$date=$_POST['date'];
	$state=$_POST['state'];
	$pincode=$_POST['pincode'];
	$manufacture=$_POST['manufacture'];
	$model=$_POST['model'];
	$tagclass=$_POST['tagclass'];
	$regno=$_POST['regno'];
	$idproof=$_POST['idproof'];
	$idno=$_POST['idno'];
  $username=$_POST['username'];
	$status='1';

	require_once 'dbh.php';
	require_once 'functions.php';
	require_once '../application/rcfile.php';
	require_once '../application/idfile.php';

	if($fileActualExtid!='pdf')
      {
      	header("location: ../application/application.php?error=invalidfileid");
       exit();
      }

    if($fileActualExtrc!='pdf')
      {
      	header("location: ../application/application.php?error=invalidfilerc");
       exit();
      }

	if (emptyInputApplication( $gender , $address , $contact , $date , $state , $pincode ,$manufacture ,$tagclass ,$regno,$model ,$idproof ,$idno  )!==false)
     {

       header("location: ../application/application.php?error=emptyinput");
       exit();
     }


    if (regnoExists($conn,$regno)!==false)
     {

       header("location: ../application/application.php?error=regnoexist");
       exit();
     }


     if (invalidmobile($contact)!==false)
     {

       header("location: ../application/application.php?error=invalidmobile");
       exit();
     }





    createApplication($conn, $name , $gender , $address , $contact , $date , $state , $pincode ,$manufacture ,$tagclass ,$regno ,$model , $fileNameNewrc ,$idproof ,$idno , $fileNameNewid ,$username ,$status ,$email);


 }
 else
 {
 	header("location: ../registration/registration.php");
 	exit();
 }
