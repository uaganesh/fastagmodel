<?php
session_start();

$regno=$_POST['registerno'];
var_dump($_POST);
echo $regno;
require_once 'dbh.php';
require_once 'functions.php';


$sql="SELECT * FROM application WHERE  username='{$_SESSION['username']}' AND vehicleregisterno='$regno' AND status='1'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {

                           	$regno=$row['vehicleregisterno'];
                            $_SESSION['regno']=$regno;






if(!isset($_POST["submit"]))
{

  $status='0';
  $payment='COMPLETED';
  $appstatus='PENDING';


  payment($conn , $status , $payment , $appstatus ,$regno);


}
 else
 {
 	header("location: ../login/login.php"); 
 	exit();
 }


}}

