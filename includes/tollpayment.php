<?php

if(isset($_POST["submit"]))
{

$fastagid=$_POST['fastagid'];
$tollusername=$_POST['tollusername'];
require_once 'dbh.php';
require_once 'functions.php';

if (fastagExists($conn,$fastagid)==false)
{

       header("location: ../toll/toll.php?error=notexist");
       exit();
}

$tagclass=checktagclass($conn,$fastagid);

$amount=checkamount($conn,$tollusername,$tagclass);


$status=checkstatus($conn,$tollusername,$tagclass);


debitamount($conn , $fastagid , $amount , $status );

mailuser($conn ,$fastagid ,$amount);


}
else {
  header("location:../login/login.php");
}
?>
