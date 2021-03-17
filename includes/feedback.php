<?php

if(isset($_POST['submit']))
{
include_once 'dbh.php';
include_once 'functions.php';

$username=$_POST['username'];
$message=$_POST['feedback'];

feedback($conn,$username,$message);

}
else
{
 header("location: ../login/login.php");
 exit();
}





























 ?>
