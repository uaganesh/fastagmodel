<?php

 if(isset($_POST["submit"]))
 {
    $username= $_POST['username'];
	$password= $_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];
	$name= $_POST['name'];
	$email=$_POST['email'];

	require_once 'dbh.php';
	require_once 'functions.php';

if (emptyInputSignup($username , $password , $confirmpassword , $name , $email  )!==false)
{

       header("location: ../registration/registration.php?error=emptyinput");
       exit();
}


if (invalidUid($username)!==false)
{

       header("location: ../registration/registration.php?error=invaliduid");
       exit();
}


if (invalidEmail($email)!==false)
{

       header("location: ../registration/registration.php?error=invalidemail");
       exit();
}


if (pwdMatch($password , $confirmpassword)!==false)
{

       header("location: ../registration/registration.php?error=passwordsdonotmatch");
       exit();
}


if (uidExists($conn , $username , $email)!==false)
{

       header("location: ../registration/registration.php?error=usernametaken");
       exit();
}


createUser($conn , $username , $password  , $name , $email);

registermail($conn, $username , $password , $name ,  $email);




 }
 else
 {
 	header("location: ../registration/registration.php");
 	exit();
 }
