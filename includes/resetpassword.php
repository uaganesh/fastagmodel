<?php

if (isset($_POST["resetpassword"]))
{
$selector= bin2hex(random_bytes(8));
$token=random_bytes(32);

$url="localhost/fastag/createpassword/createpassword.php?selector=".$selector."&validator=".bin2hex($token);

$expires= date("U")+ 1800;

require 'dbh.php';

$email=$_POST["email"];

$sql = "DELETE FROM pwdreset where pwdResetEmail=?";
$stmt=mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt ,$sql) )
{
  echo "There was an error";
  exit();
}
else {

mysqli_stmt_bind_param($stmt, "s" , $email);
mysqli_stmt_execute($stmt);
  }

$sql="INSERT INTO pwdreset (pwdResetEmail,pwdResetSelector,pwdResetToken ,pwdResetExpires) VALUES (?,?,?,?);";

$stmt=mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt ,$sql) )
{
  echo "There was an error";
  exit();
}
else {
$hashedToken=password_hash($token,PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt, "ssss" , $email , $selector ,$hashedToken ,$expires);
mysqli_stmt_execute($stmt);
  }

mysqli_stmt_close($stmt);
mysqli_close($conn);



$to=$email;
$subject= 'Reset your Password on FASTag';
$message='<html><body><p style="color:#eb4034; font-family: "Lucida Console", "Courier New", monospace;">We have recieved a password reset request for your FASTag Account. if you didnt make the request you can ignore it</p>';

$message .='<p> Here is your password rest link : </br></br>';

$message .='<br><br><a href="' .$url.  '">'.$url.'</a></p></br><p style="color:#660033 ">© FASTag 2020(Arun Baby & Team)</p></body></html>';

$headers="From: FASTag Support\r\n";
$headers .= "Content-type: text/html\r\n";
$headers .="Reply-to: \r\n ";


mail($to,$subject,$message,$headers);

header("Location:../reset/reset.php?reset=success");































}
else {
  header("Location: ../index/index.php");
}





















 ?>
